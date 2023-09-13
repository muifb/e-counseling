function previewImage(event) {
    const images = document.querySelector("#photo" + event);
    const imagePreview = document.querySelector(".photo" + event);
    // const imgPreview = document.querySelector('.img-preview1');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(images.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        div.innerHTML =
            '<div class="ratio ratio-16x9"><video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video></div>';

        const divImg = document.createElement("div");
        divImg.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        divImg.innerHTML =
            '<img class="img-preview2 img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? imagePreview.parentNode.replaceChild(divImg, imagePreview)
            : imagePreview.parentNode.replaceChild(div, imagePreview);
    };
}

// image preview agama
function previewImageAgama(eAgama) {
    const imagesAgama = document.querySelector("#photoAgama" + eAgama);
    const imagePreviewAgama = document.querySelector(".photo-agama" + eAgama);

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imagesAgama.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        div.innerHTML =
            '<div class="ratio ratio-16x9"><video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video></div>';

        const divImg = document.createElement("div");
        divImg.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        divImg.innerHTML =
            '<img class="img-preview2 img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? imagePreviewAgama.parentNode.replaceChild(
                  divImg,
                  imagePreviewAgama
              )
            : imagePreviewAgama.parentNode.replaceChild(div, imagePreviewAgama);
    };
}

// image preview motorik
function previewImageMotorik(eMotorik) {
    const imagesMotorik = document.querySelector("#photoMotorik" + eMotorik);
    const imagePreviewMotorik = document.querySelector(
        ".photo-motorik" + eMotorik
    );

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imagesMotorik.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        div.innerHTML =
            '<div class="ratio ratio-16x9"><video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video></div>';

        const divImg = document.createElement("div");
        divImg.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        divImg.innerHTML =
            '<img class="img-preview2 img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? imagePreviewMotorik.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik
              )
            : imagePreviewMotorik.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik
              );
    };
}

// image preview kognitif
function previewImageKognitif(eKognitif) {
    const imagesKognitif = document.querySelector("#photoKognitif" + eKognitif);
    const imagePreviewKognitif = document.querySelector(
        ".photo-kognitif" + eKognitif
    );

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imagesKognitif.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        div.innerHTML =
            '<div class="ratio ratio-16x9"><video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video></div>';

        const divImg = document.createElement("div");
        divImg.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        divImg.innerHTML =
            '<img class="img-preview2 img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? imagePreviewKognitif.parentNode.replaceChild(
                  divImg,
                  imagePreviewKognitif
              )
            : imagePreviewKognitif.parentNode.replaceChild(
                  div,
                  imagePreviewKognitif
              );
    };
}

// image preview sosial
function previewImageSosial(eSosial) {
    const imagesMotorik = document.querySelector("#photoSosial" + eSosial);
    const imagePreviewMotorik = document.querySelector(
        ".photo-sosial" + eSosial
    );
    // const imgPreview = document.querySelector('.img-preview1');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imagesMotorik.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        div.innerHTML =
            '<div class="ratio ratio-16x9"><video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video></div>';

        const divImg = document.createElement("div");
        divImg.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        divImg.innerHTML =
            '<img class="img-preview2 img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? imagePreviewMotorik.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik
              )
            : imagePreviewMotorik.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik
              );
    };
}

// image preview bahasa
function previewImageBahasa(eBahasa) {
    const imagesMotorik = document.querySelector("#photoBahasa" + eBahasa);
    const imagePreviewMotorik = document.querySelector(
        ".photo-bahasa" + eBahasa
    );
    // const imgPreview = document.querySelector('.img-preview1');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imagesMotorik.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        div.innerHTML =
            '<div class="ratio ratio-16x9"><video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video></div>';

        const divImg = document.createElement("div");
        divImg.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        divImg.innerHTML =
            '<img class="img-preview2 img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? imagePreviewMotorik.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik
              )
            : imagePreviewMotorik.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik
              );
    };
}

// image preview seni
function previewImageSeni(eSeni) {
    const imagesMotorik = document.querySelector("#photoSeni" + eSeni);
    const imagePreviewMotorik = document.querySelector(".photo-seni" + eSeni);
    // const imgPreview = document.querySelector('.img-preview1');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imagesMotorik.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        div.innerHTML =
            '<div class="ratio ratio-16x9"><video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video></div>';

        const divImg = document.createElement("div");
        divImg.classList = "ms-1 mb-1 col-md-3 border rounded p-2";

        divImg.innerHTML =
            '<img class="img-preview2 img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? imagePreviewMotorik.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik
              )
            : imagePreviewMotorik.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik
              );
    };
}

// file edit nilai agama
function fileAgamaEdit(nAgama) {
    const file = document.querySelector("#imageAgamaEdit" + nAgama);
    const filePreview = document.querySelector(".image-agama-edit" + nAgama);

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ratio ratio-16x9 image-agama-edit" + nAgama;

        div.innerHTML =
            '<video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video>';

        const divImg = document.createElement("div");
        divImg.classList = "portfolio-img image-agama-edit" + nAgama;

        divImg.innerHTML =
            '<img class="img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? filePreview.parentNode.replaceChild(divImg, filePreview)
            : filePreview.parentNode.replaceChild(div, filePreview);
    };
}

// file edit nilai motorik
function fileMotorikEdit(nMotorik) {
    const file = document.querySelector("#imageMotorikEdit" + nMotorik);
    const filePreview = document.querySelector(
        ".image-motorik-edit" + nMotorik
    );

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ratio ratio-16x9 image-motorik-edit" + nMotorik;

        div.innerHTML =
            '<video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video>';

        const divImg = document.createElement("div");
        divImg.classList = "portfolio-img image-motorik-edit" + nMotorik;

        divImg.innerHTML =
            '<img class="img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? filePreview.parentNode.replaceChild(divImg, filePreview)
            : filePreview.parentNode.replaceChild(div, filePreview);
    };
}

// file edit nilai kognitif
function fileKognitifEdit(nKognitif) {
    const file = document.querySelector("#imageKognitifEdit" + nKognitif);
    const filePreview = document.querySelector(
        ".image-kognitif-edit" + nKognitif
    );

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ratio ratio-16x9 image-kognitif-edit" + nKognitif;

        div.innerHTML =
            '<video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video>';

        const divImg = document.createElement("div");
        divImg.classList = "portfolio-img image-kognitif-edit" + nKognitif;

        divImg.innerHTML =
            '<img class="img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? filePreview.parentNode.replaceChild(divImg, filePreview)
            : filePreview.parentNode.replaceChild(div, filePreview);
    };
}

// file edit nilai sosial
function fileSosialEdit(nSosial) {
    const file = document.querySelector("#imageSosialEdit" + nSosial);
    const filePreview = document.querySelector(".image-sosial-edit" + nSosial);

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ratio ratio-16x9 image-sosial-edit" + nSosial;

        div.innerHTML =
            '<video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video>';

        const divImg = document.createElement("div");
        divImg.classList = "portfolio-img image-sosial-edit" + nSosial;

        divImg.innerHTML =
            '<img class="img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? filePreview.parentNode.replaceChild(divImg, filePreview)
            : filePreview.parentNode.replaceChild(div, filePreview);
    };
}

// file edit nilai bahasa
function fileBahasaEdit(nBahasa) {
    const file = document.querySelector("#imageBahasaEdit" + nBahasa);
    const filePreview = document.querySelector(".image-bahasa-edit" + nBahasa);

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ratio ratio-16x9 image-bahasa-edit" + nBahasa;

        div.innerHTML =
            '<video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video>';

        const divImg = document.createElement("div");
        divImg.classList = "portfolio-img image-bahasa-edit" + nBahasa;

        divImg.innerHTML =
            '<img class="img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? filePreview.parentNode.replaceChild(divImg, filePreview)
            : filePreview.parentNode.replaceChild(div, filePreview);
    };
}

// file edit nilai seni
function fileSeniEdit(nSeni) {
    const file = document.querySelector("#imageSeniEdit" + nSeni);
    const filePreview = document.querySelector(".image-seni-edit" + nSeni);

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);

    oFReader.onload = function (oFREvent) {
        const dataURL = oFREvent.target.result;
        const mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

        const div = document.createElement("div");
        div.classList = "ratio ratio-16x9 image-seni-edit" + nSeni;

        div.innerHTML =
            '<video class="img-fluid" controls><source src="' +
            oFREvent.target.result +
            '" type="video/mp4" /></video>';

        const divImg = document.createElement("div");
        divImg.classList = "portfolio-img image-seni-edit" + nSeni;

        divImg.innerHTML =
            '<img class="img-fluid" alt="" src="' +
            oFREvent.target.result +
            '">';

        mimeType.match("image.*")
            ? filePreview.parentNode.replaceChild(divImg, filePreview)
            : filePreview.parentNode.replaceChild(div, filePreview);
    };
}
