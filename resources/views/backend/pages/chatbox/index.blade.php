@extends('backend.layouts.defaults')
@section('title')
Chat
@endsection
@section('content')

<div class="chat-wrapper" style="height: 520px;">
    <div class="chat-sidebar">
        <div class="chat-sidebar-content">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-Chats">
                    <div class="p-3">
                        <div class="dropdown mt-3"> <a href="#" class="text-uppercase text-secondary dropdown-toggle dropdown-toggle-nocaret">Chats</a>
                        </div>
                    </div>
                    <div class="chat-list" style="height: 520px">
                        <div class="list-group list-group-flush">
                            @foreach($all_messages as $message)
                            <a href="javascript:;" class="list-group-item view-chat" data-chat-id="{{$message->id}}">

                                <div class="d-flex">
                                    <div>
                                        <img src="{{asset('backend/')}}/images/avatars/266033.png" width="42" height="42" class="rounded-circle" alt />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">{{$message->name}}</h6>
                                        <p class="mb-0 chat-msg">{{ substr($message->message, 0, 20) }}{{ strlen($message->message) > 20 ? '...' : '' }}</p>
                                    </div>
                                    <div class="chat-time">{{ $message->created_at->diffForHumans() }}</div>
                                </div>

                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-details">

    </div>

    <!--start chat overlay-->
    <!--end chat overlay-->
</div>

@endsection

@section('scripts')
<script>
    new PerfectScrollbar('.chat-list');
    new PerfectScrollbar('.chat-content');
</script>

<script>
    $(document).ready(function() {
        $('.view-chat').on('click', function(e) {
            e.preventDefault();
            $('.chat-details').html("");

            // Retrieve the chat ID from the data attribute
            var chatId = $(this).data('chat-id');

            // Make an AJAX request to fetch the chat for the selected ID
            $.ajax({
                url: '/admin/fetch-chat/' + chatId, // Adjust the URL as needed
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    function formatTimestamp(timestamp) {
                        var now = new Date();
                        var messageDate = new Date(timestamp);
                        var timeDifference = now - messageDate;
                        var seconds = Math.floor(timeDifference / 1000);
                        var minutes = Math.floor(seconds / 60);
                        var hours = Math.floor(minutes / 60);
                        var days = Math.floor(hours / 24);

                        if (days > 7) {
                            return messageDate.toLocaleDateString(); // Display the date
                        } else if (hours > 24) {
                            return days + ' day' + (days > 1 ? 's' : '') + ' ago'; // Display days
                        } else if (hours >= 1) {
                            return hours + ' hour' + (hours > 1 ? 's' : '') + ' ago'; // Display hours
                        } else if (minutes >= 1) {
                            return minutes + ' minute' + (minutes > 1 ? 's' : '') + ' ago'; // Display minutes
                        } else {
                            return 'Just now'; // Less than a minute
                        }
                    }
                    var formattedTime = formatTimestamp(data.created_at);
                    // Handle the retrieved chat data here and display it in the chat interface
                    console.log(data.name);
                    $('.chat-details').append('<div class="chat-header d-flex align-items-center"><div class="chat-toggle-btn"><i class="bx bx-menu-alt-left"></i></div><div><h4 class="mb-1 font-weight-bold">' + data.name + '</h4><div class="list-inline d-sm-flex mb-0 d-none"><a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">' + data.email + '</a><a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">|</a><a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><i class="bx bx-images me-1"></i>' + data.phone + '</a></div></div></div><div class="chat-content"><div class="chat-content-leftside"><div class="d-flex"><img src="{{asset("backend/")}}/images/avatars/266033.png" width="30" height="30" class="rounded-circle" alt /><div class="flex-grow-1 ms-2"><p class="mb-0 chat-time">' + data.name + ', ' + formattedTime + '</p><p class="chat-left-msg">' + data.message + '</p></div></div></div></div><div class="chat-footer d-flex align-items-center"><div class="flex-grow-1 pe-2"><div class="input-group"> <span class="input-group-text"><i class="bx bx-smile"></i></span><input type="text" class="form-control" placeholder="Type a message"></div></div><div class="chat-footer-menu"></div></div>')
                    // You can update the UI to display the chat messages and sender information
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>


@endsection