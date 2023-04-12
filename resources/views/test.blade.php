<div class="chat-history">
    <ul class="m-b-0 overflow-auto">

        @foreach ($messages as $item)
            @if ($item->landlord_id == $user_id)
                <li class="clearfix">
                    <div class="message-data">
                        <span class="message-data-time">10:15 AM, Today</span>
                    </div>
                    <div class="message other-message float-right"> {{ $item->message }}
                    </div>
                </li>
            @endif
            @php
                $user_id = Auth::user()->id;
            @endphp
                
            @if ($item->user_id == Auth::user()->id)
                <li class="clearfix">
                    <div class="message other-message ">
                        <div class="message-data bg-white">
                            <span class="message-data-time">10:15 AM, Today</span>
                        </div>
                        {{ $item->message }} 
                    </div>
                </li>
            @endif
                

            


            {{-- <li class="clearfix">
                <div class="message-data">
                    <span class="message-data-time">10:15 AM, Today</span>
                </div>
                <div class="message my-message">Project has been already finished and I have
                    results to show you.</div>
            </li> --}}
        @endforeach


    </ul>
</div>
<div class="chat-message clearfix">
    <form action="/messages/send/{{$user_id}}/{{$landlord_idd}}" method="post">
        @csrf
        <div class="input-group mb-0">
            <input type="text" name="message" class="form-control" placeholder="Enter text here...">
            <div class="input-group-prepend">
                <button type="submit" class="border-0">
                    <span class="input-group-text"><i class="fa fa-send"></i></span>
                </button>
            </div>
        </div>
    </form>

</div>