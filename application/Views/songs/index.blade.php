@extends ('base')


@section ('content')



<div id="allSongs">
    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Add a song
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{--<form action="{{route('addsong')}}" method="POST">--}}
                            <div class="form-row">
                                <div class="col-4">
                                    <input type="text" name="artist" id="artist" class="form-control" placeholder="">
                                </div>
                                <div class="col">
                                    <input type="text" name="track" id="track" class="form-control" placeholder="">
                                </div>
                                <div class="col">
                                    <input type="text" name="link" id="link" class="form-control" placeholder="">
                                </div>
                                <button class="btn btn-primary" type="button" id="addSong">Add</button>
                            </div>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Songs
                 </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="background-color: #ddd; font-weight: bold;">
                            <tr>
                                <td>Artist</td>
                                <td>Track</td>
                                <td>Link</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody id="songsList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
    <script>

        function getData()
        {
            $.ajax({
                url: '{{ route('getData') }}',
                contentType: "application/json",
                success: function(data) {
                    var html = '';
                    var songs = JSON.parse(data);
                    for (i=0;i<songs.length;i++){

                        html += '<tr>' +
                            '<td hidden class="songId">'+songs[i].id+'</td>' +
                            '<td id="art" contenteditable="true">'+songs[i].artist+'</td>' +
                            '<td id="trck" contenteditable>'+songs[i].track+'</td>' +
                            '<td id="lnk" contenteditable><a target="_blank" href="'+songs[i].link+'">'+songs[i].link+'</a></td>' +
                            '<td><button id="editSong" type="button" class="btn btn-light"><i class="fas fa-edit"></i></button></td>' +
                            '<td><button id="deleteSong" type="button" class="btn btn-light"><i class="fas fa-eraser"></i></button></td>' +
                            '</tr>';
                    }
                    $('#songsList').append(html);
                }
            });
        }

        $(document).ready(function() {
            getData();
        });

        $('#addSong').click(function() {
            var artist = $('#artist').val();
            var track = $('#track').val();
            var link = $('#link').val();
            $.ajax({
                type: "post",
                url: '{{route('addsong')}}',
                data: ({artist: artist, track: track, link: link}),

                success: function(response) {
                    $("#songsList").load(" #songsList");
                    getData();
                }
            });
        });


        $('body').on('click', '#deleteSong', function() {
            var $row = $(this).closest("tr");
            var songId = $row.find(".songId").html();
            $.ajax({
                type: "GET",
                url: '/deletesong/' + songId,
                data: $(this).serialize(),
                contentType: "application/json",
                success: function(respo) {
                    $("#songsList").load(" #songsList");
                    getData();
                }
            });
        });

        /*
        Edit da se zavrsi
         */

    </script>
@endsection