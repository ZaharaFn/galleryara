var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
});

function loadMoreData(paginate) {
    $.ajax({
        url: window.location.origin + '/getDataExplore/'+ '?page='+paginate,
        type: "GET",
        dataType: "JSON",
        success: function (e) {
            console.log(e);
            e.data.data.map((x) => {
                let datanya = {
                    id: x.id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi_foto,
                    foto: x.lokasi_file,
                    jml_comment: x.comment_count,
                    jml_like: x.like_count,
                }
                dataExplore.push(datanya);
            })
            getExplore();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle error
        }
    })
}

const getExplore =()=>{
    $('#exploredata').html('');
    dataExplore.map((x, i) => {
        $('#exploredata').append(
            `
            <div class="lg:w-1/2 mx-auto ">
                <div class="flex flex-col">
                        <div class="w-[363px] h-[180px] bg--300 overflow-hidden rounded-md">
                            <img src="/foto/${x.foto}">
                        </div>
                        <div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex flex-col">
                                        <div>
                                            <span class="">${x.judul}</span>
                                        </div>
                                        <div>
                                            <span class="text-xs text-gray-500">${x.deskripsi}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex gap-2 mr-6">
                                    <a href="/detailcomment/${x.id}">
                                            <small">${x.jml_comment}</small>
                                            <span class="bi bi-chat-left-text"></span>
                                    </a>
                                            <small">${x.jml_like}</small>
                                            <span class="bi bi-heart" onclick="likes(this, ${x.id})"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>`
        )
    })
}

function likes(txt, id) {
    $.ajax({
        url: window.location.origin +'/like',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: id,
            },
            success: function(res) {
                console.log(res)
                location.reload()
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('gagal')
        }
    })
}

