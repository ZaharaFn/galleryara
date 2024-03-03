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
        url: window.location.origin + '/getDataPostingku/' + '?page=' + paginate,
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

const getExplore = () => {
    $('#postingku').html('');
    dataExplore.map((x, i) => {
        $('#postingku').append(
            `
            <div class=" mx-auto mt-3 lg:mt-0">
            <div class="flex flex-col">
                <div class="w-[330px] h-[159px]  overflow-hidden rounded-lg">
                    <img class="transition duration-500 ease-in-out hover:scale-125" class="w-full"
                        src="/foto/${x.foto}" alt="">
                </div>
                <div>
                    <div class="flex items-center justify-between lg:mr-10">
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

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`
        )
    })
}

function likes(txt, id) {
    $.ajax({
        url: window.location.origin + '/like',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: id,
        },
        success: function (res) {
            console.log(res)
            location.reload()
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal')
        }
    })
}
