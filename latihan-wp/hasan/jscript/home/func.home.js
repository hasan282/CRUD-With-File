$(document).ready(function () {

    $('.delz').click(function () {
        let Num = this.id.split('@@');
        Swal.fire({
            title: 'Hapus ' + Num[1] + '?',
            text: "Data tidak akan bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus Data'
        }).then(result => {
            if (result.value) {
                DeleteRec(Num[0]);
            }
        });
    });

    const DeleteRec = id => {
        const MyURL = BaseURL + '/form/delete/' + id;
        window.location.href = MyURL;
    }

});