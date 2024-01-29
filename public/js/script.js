$(function () {
    // $(".add-users-guardians").on("click", function () {
    //     const id = $(this).data("id");
    //     $.ajax({
    //         url: "/administrator/cekData?id=" + id,
    //         dataType: "json",
    //         success: function (data) {
    //             $("#inputName").val(data.nama_ortu);
    //             $("#username").val(data.no_induk);
    //             $("#inputId").val(data.id);
    //             $("#password").val("password");
    //             $("#passwordH").val("password");
    //         },
    //     });
    // });

    // $(".add-user-guru").on("click", function () {
    //     const id = $(this).data("id");
    //     console.log(id);
    //     $.ajax({
    //         url: "/administrator/cekDataGuru?id=" + id,
    //         dataType: "json",
    //         success: function (data) {\
    //             $("#inputNameGuru").val(data.nama_guru);
    //             $("#usernameGuru").val(data.nuptk);
    //             $("#inputIdGuru").val(data.id);
    //             $("#role").val(data.devisi);
    //             $("#passwordGuru").val("password");
    //             $("#passwordHGuru").val("password");
    //         },
    //     });
    // });

    $(".edit-tema").on("click", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/administrator/cekTema?id=" + id,
            dataType: "json",
            success: function (data) {
                $("#id").val(data.id);
                $("#inputTemaEdit").val(data.nama_tema);
                $("#inputPertemuanEdit").val(data.pertemuan);
                $("#inputSemesterEdit").val(data.semester);
                // $("#inputTahunEdit").val(data.tahun_id);
                $("#inputSentraEdit").val(data.sentra);
            },
        });
    });

    $(".edit-kelompok").on("click", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "/administrator/cekKelompok?id=" + id,
            dataType: "json",
            success: function (data) {
                $("#id_kelompok").val(data.id);
                $("#inputKelompokEdit").val(data.nama_kelompok);
            },
        });
    });

    $(".flatpickr").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });
});
