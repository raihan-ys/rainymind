@extends('layouts.app')
@section('title', 'Home')

@section('css')
    {{-- Custom CSS --}}
    <style>
        #raindropContainer {
            height: 100%;
            left: 0;
            pointer-events: none;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
        }
        .raindrop {
            animation: fall linear infinite;
            border-radius: 3px;
            bottom: 100%;
            height: 5px;
            position: absolute;
            width: 5px;
        }
        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }
    </style>
@endsection

@section('content')
    {{-- AI Chat Widget --}}
    <div id="chat-widget" style="position:fixed; bottom:20px; right:20px; width:300px;">
        <div id="chat-box" class="border rounded p-2 bg-white" style="height:400px; overflow-y:auto;"></div>
        <input id="chat-input" class="form-control" placeholder="Ask me…">
    </div>

    {{-- Raindrop Container --}}
    <div id="raindropContainer"></div>
@endsection

@section('js')
    {{-- Custom JS --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(document).ready(function() {
            // Generate raindrops
            const RAINDROP_CONTAINER = $('#raindropContainer');
            const NUMBER_OF_RAINDROPS = 10;

            for (let i = 0; i < NUMBER_OF_RAINDROPS; i++) {
                const RAINDROP = $('<span class="raindrop bg-info"></span>');
                RAINDROP.css({
                    left: Math.random() * 100 + "vw",
                    animationDuration: Math.random() * 2 + 1 + "s",
                    animationDelay: Math.random() * 5 + "s"
                });
                RAINDROP_CONTAINER.append(RAINDROP);
            }

            // AI Chat Widget
            const CHAT_BOX = $('#chat-box');
            const CHAT_INPUT = $('#chat-input');

            CHAT_INPUT.on('keypress', function(e) {
                // Check for Enter key press.
                if (e.which === 13 && CHAT_INPUT.val().trim() !== '') {
                    const USER_MSG = CHAT_INPUT.val();
                    CHAT_BOX.append(`<div class="text-start"><strong>You:</strong> ${USER_MSG}</div>`);
                    CHAT_INPUT.val('');
                    $.post('/rainy/chat', { message: USER_MSG }, function(data) {
                        let response = "Sorry, I couldn't understand the response.";
                        // Check if data is valid and contains choices.
                        if (data && data.choices && Array.isArray(data.choices) && data.choices[0] && data.choices[0].message) {
                            response = data.choices[0].message.content;
                        } else if (data && data.error) {
                            response = "Error: " + data.error;
                            console.log(data.error);
                        }
                        CHAT_BOX.append(`<div class="text-end"><strong>Rainy:</strong> ${response}</div>`);
                        CHAT_BOX.scrollTop(CHAT_BOX[0].scrollHeight);
                    });
                }
            })
        });
    </script>
@endsection
