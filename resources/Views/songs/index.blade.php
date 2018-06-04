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
                        <div>
                            <div id="emptySongs" class="table-responsive">
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
    </div>


@endsection

@section('scripts')
    <script>
        function getIndexData() {
            $.ajax({
                url: "{{route('api.get.songs', ['user_id' => $user_id])}}",
                contentType: "application/json",
                success: function (data) {
                    var html = '';
                    // console.log(data);
                    var songs = JSON.parse(data).model;
                    // console.log(songs);
                    for (i = 0; i < songs.length; i++) {
                        if (songs[i].admin === '1') {
                            html += '<tr>' +
                                '<td hidden class="songId">' + songs[i].id + '</td>' +
                                '<td id="art">' + songs[i].artist + '</td>' +
                                '<td id="trck">' + songs[i].track + '</td>' +
                                '<td id="lnk"><a id="atr" target="_blank" href="' + songs[i].link + '">' + songs[i].link + '</a></td>' +
                                '<td><a href="/edit/' + songs[i].id + '" class="btn btn-light"><i class="fas fa-edit"></i></a></td>' +
                                '<td><button id="deleteSong" type="button" class="btn btn-light"><i class="fas fa-trash-alt"></i></i></button></td>' +
                                '</tr>';
                        }
                        else {
                            html += '<tr>' +
                                '<td hidden class="songId">' + songs[i].id + '</td>' +
                                '<td id="art">' + songs[i].artist + '</td>' +
                                '<td id="trck">' + songs[i].track + '</td>' +
                                '<td id="lnk"><a id="atr" target="_blank" href="' + songs[i].link + '">' + songs[i].link + '</a></td>' +
                                '</tr>';
                        }
                    }
                    $('#songsList').html(html);
                }
            });
        }

        $(document).ready(function () {
            getIndexData();
        });

        $('#addSong').click(function () {
            var artist = $('#artist').val();
            var track = $('#track').val();
            var link = $('#link').val();

            $.ajax({
                type: "post",
                url: '{{route('create')}}',
                data: ({artist: artist, track: track, link: link}),
                success: function (response) {
                    $('#artist').val('');
                    $('#track').val('');
                    $('#link').val('');
                    
                    html = '';
                    response = JSON.parse(response);
                    if (response.model.admin === '1')
                    {
                        html += '<tr>' +
                            '<td hidden class="songId">' + response.model.id + '</td>' +
                            '<td id="art">' + response.model.artist + '</td>' +
                            '<td id="trck">' + response.model.track + '</td>' +
                            '<td id="lnk"><a id="atr" target="_blank" href="' + response.model.link + '">' + response.model.link + '</a></td>' +
                            '<td><a href="/edit/' + response.model.id + '" class="btn btn-light"><i class="fas fa-edit"></i></a></td>' +
                            '<td><button id="deleteSong" type="button" class="btn btn-light"><i class="fas fa-trash-alt"></i></i></button></td>' +
                            '</tr>';
                    }
                    else
                    {
                        html += '<tr>' +
                            '<td hidden class="songId">' + response.model.id + '</td>' +
                            '<td id="art">' + response.model.artist + '</td>' +
                            '<td id="trck">' + response.model.track + '</td>' +
                            '<td id="lnk"><a id="atr" target="_blank" href="' + response.model.link + '">' + response.model.link + '</a></td>' +
                            '</tr>';
                    }

                    $('#songsList').prepend(html);
                    setMessage('success', response);
                }
            });
        });

        $('body').on('click', '#deleteSong', function () {
            var $row = $(this).closest("tr");
            var songId = $row.find(".songId").html();
            $.ajax({
                type: "GET",
                url: '/api/delete/' + songId,
                data: $(this).serialize(),
                contentType: "application/json",
                success: function (response) {
                    // response = JSON.stringify(response);
                    response = JSON.parse(response);
                    console.log(response);
                    $('td:contains("' + response.song + '")').parent().css("display", "none");
                    setMessage('success', response);
                }
            });
        });
    </script>
@endsection