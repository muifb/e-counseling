function previewImage1() {
    const images = document.querySelector("#photo1");
    const imagePreview = document.querySelector(".photo1");
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

function previewImage2() {
    const image2 = document.querySelector("#photo2");
    const imagePreview2 = document.querySelector(".photo2");
    // const imgPreview = document.querySelector('.img-preview2');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image2.files[0]);

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
            ? imagePreview2.parentNode.replaceChild(divImg, imagePreview2)
            : imagePreview2.parentNode.replaceChild(div, imagePreview2);
    };
}

function previewImage3() {
    const image3 = document.querySelector("#photo3");
    const imagePreview3 = document.querySelector(".photo3");
    // const imgPreview3 = document.querySelector('.img-preview3');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image3.files[0]);

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
            ? imagePreview3.parentNode.replaceChild(divImg, imagePreview3)
            : imagePreview3.parentNode.replaceChild(div, imagePreview3);
    };
}

function previewImage4() {
    const image4 = document.querySelector("#photo4");
    const imagePreview4 = document.querySelector(".photo4");
    // const imgPreview4 = document.querySelector('.img-preview4');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image4.files[0]);

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
            ? imagePreview4.parentNode.replaceChild(divImg, imagePreview4)
            : imagePreview4.parentNode.replaceChild(div, imagePreview4);
    };
}

// image preview agama
function previewImageAgama1() {
    const imagesAgama = document.querySelector("#photoAgama1");
    const imagePreviewAgama = document.querySelector(".photo-agama1");
    // const imgPreview = document.querySelector('.img-preview1');

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

function previewImageAgama2() {
    const imageAgama2 = document.querySelector("#photoAgama2");
    const imagePreviewAgama2 = document.querySelector(".photo-agama2");
    // const imgPreview = document.querySelector('.img-preview2');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageAgama2.files[0]);

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
            ? imagePreviewAgama2.parentNode.replaceChild(
                  divImg,
                  imagePreviewAgama2
              )
            : imagePreviewAgama2.parentNode.replaceChild(
                  div,
                  imagePreviewAgama2
              );
    };
}

function previewImageAgama3() {
    const imageAgama3 = document.querySelector("#photoAgama3");
    const imagePreviewAgama3 = document.querySelector(".photo-agama3");
    // const imgPreview3 = document.querySelector('.img-preview3');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageAgama3.files[0]);

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
            ? imagePreviewAgama3.parentNode.replaceChild(
                  divImg,
                  imagePreviewAgama3
              )
            : imagePreviewAgama3.parentNode.replaceChild(
                  div,
                  imagePreviewAgama3
              );
    };
}

function previewImageAgama4() {
    const imageAgama4 = document.querySelector("#photoAgama4");
    const imagePreviewAgama4 = document.querySelector(".photo-agama4");
    // const imgPreview4 = document.querySelector('.img-preview4');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageAgama4.files[0]);

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
            ? imagePreviewAgama4.parentNode.replaceChild(
                  divImg,
                  imagePreviewAgama4
              )
            : imagePreviewAgama4.parentNode.replaceChild(
                  div,
                  imagePreviewAgama4
              );
    };
}

// image preview motorik
function previewImageMotorik1() {
    const imagesMotorik = document.querySelector("#photoMotorik1");
    const imagePreviewMotorik = document.querySelector(".photo-motorik1");
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

function previewImageMotorik2() {
    const imageMotorik2 = document.querySelector("#photoMotorik2");
    const imagePreviewMotorik2 = document.querySelector(".photo-motorik2");
    // const imgPreview = document.querySelector('.img-preview2');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik2.files[0]);

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
            ? imagePreviewMotorik2.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik2
              )
            : imagePreviewMotorik2.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik2
              );
    };
}

function previewImageMotorik3() {
    const imageMotorik3 = document.querySelector("#photoMotorik3");
    const imagePreviewMotorik3 = document.querySelector(".photo-motorik3");
    // const imgPreview3 = document.querySelector('.img-preview3');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik3.files[0]);

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
            ? imagePreviewMotorik3.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik3
              )
            : imagePreviewMotorik3.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik3
              );
    };
}

function previewImageMotorik4() {
    const imageMotorik4 = document.querySelector("#photoMotorik4");
    const imagePreviewMotorik4 = document.querySelector(".photo-motorik4");
    // const imgPreview4 = document.querySelector('.img-preview4');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik4.files[0]);

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
            ? imagePreviewMotorik4.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik4
              )
            : imagePreviewMotorik4.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik4
              );
    };
}

// image preview kognitif
function previewImageKognitif1() {
    const imagesKognitif = document.querySelector("#photoKognitif1");
    const imagePreviewKognitif = document.querySelector(".photo-kognitif1");
    // const imgPreview = document.querySelector('.img-preview1');

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

function previewImageKognitif2() {
    const imageKognitif2 = document.querySelector("#photoKognitif2");
    const imagePreviewKognitif2 = document.querySelector(".photo-kognitif2");
    // const imgPreview = document.querySelector('.img-preview2');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageKognitif2.files[0]);

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
            ? imagePreviewKognitif2.parentNode.replaceChild(
                  divImg,
                  imagePreviewKognitif2
              )
            : imagePreviewKognitif2.parentNode.replaceChild(
                  div,
                  imagePreviewKognitif2
              );
    };
}

function previewImageKognitif3() {
    const imageKognitif3 = document.querySelector("#photoKognitif3");
    const imagePreviewKognitif3 = document.querySelector(".photo-kognitif3");
    // const imgPreview3 = document.querySelector('.img-preview3');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageKognitif3.files[0]);

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
            ? imagePreviewKognitif3.parentNode.replaceChild(
                  divImg,
                  imagePreviewKognitif3
              )
            : imagePreviewKognitif3.parentNode.replaceChild(
                  div,
                  imagePreviewKognitif3
              );
    };
}

function previewImageKognitif4() {
    const imageKognitif4 = document.querySelector("#photoKognitif4");
    const imagePreviewKognitif4 = document.querySelector(".photo-kognitif4");
    // const imgPreview4 = document.querySelector('.img-preview4');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageKognitif4.files[0]);

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
            ? imagePreviewKognitif4.parentNode.replaceChild(
                  divImg,
                  imagePreviewKognitif4
              )
            : imagePreviewKognitif4.parentNode.replaceChild(
                  div,
                  imagePreviewKognitif4
              );
    };
}

// image preview sosial
function previewImageSosial1() {
    const imagesMotorik = document.querySelector("#photoSosial1");
    const imagePreviewMotorik = document.querySelector(".photo-sosial1");
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

function previewImageSosial2() {
    const imageMotorik2 = document.querySelector("#photoSosial2");
    const imagePreviewMotorik2 = document.querySelector(".photo-sosial2");
    // const imgPreview = document.querySelector('.img-preview2');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik2.files[0]);

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
            ? imagePreviewMotorik2.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik2
              )
            : imagePreviewMotorik2.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik2
              );
    };
}

function previewImageSosial3() {
    const imageMotorik3 = document.querySelector("#photoSosial3");
    const imagePreviewMotorik3 = document.querySelector(".photo-sosial3");
    // const imgPreview3 = document.querySelector('.img-preview3');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik3.files[0]);

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
            ? imagePreviewMotorik3.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik3
              )
            : imagePreviewMotorik3.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik3
              );
    };
}

function previewImageSosial4() {
    const imageMotorik4 = document.querySelector("#photoSosial4");
    const imagePreviewMotorik4 = document.querySelector(".photo-sosial4");
    // const imgPreview4 = document.querySelector('.img-preview4');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik4.files[0]);

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
            ? imagePreviewMotorik4.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik4
              )
            : imagePreviewMotorik4.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik4
              );
    };
}

// image preview bahasa
function previewImageBahasa1() {
    const imagesMotorik = document.querySelector("#photoBahasa1");
    const imagePreviewMotorik = document.querySelector(".photo-bahasa1");
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

function previewImageBahasa2() {
    const imageMotorik2 = document.querySelector("#photoBahasa2");
    const imagePreviewMotorik2 = document.querySelector(".photo-bahasa2");
    // const imgPreview = document.querySelector('.img-preview2');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik2.files[0]);

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
            ? imagePreviewMotorik2.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik2
              )
            : imagePreviewMotorik2.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik2
              );
    };
}

function previewImageBahasa3() {
    const imageMotorik3 = document.querySelector("#photoBahasa3");
    const imagePreviewMotorik3 = document.querySelector(".photo-bahasa3");
    // const imgPreview3 = document.querySelector('.img-preview3');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik3.files[0]);

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
            ? imagePreviewMotorik3.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik3
              )
            : imagePreviewMotorik3.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik3
              );
    };
}

function previewImageBahasa4() {
    const imageMotorik4 = document.querySelector("#photoBahasa4");
    const imagePreviewMotorik4 = document.querySelector(".photo-bahasa4");
    // const imgPreview4 = document.querySelector('.img-preview4');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik4.files[0]);

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
            ? imagePreviewMotorik4.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik4
              )
            : imagePreviewMotorik4.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik4
              );
    };
}

// image preview seni
function previewImageSeni1() {
    const imagesMotorik = document.querySelector("#photoSeni1");
    const imagePreviewMotorik = document.querySelector(".photo-seni1");
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

function previewImageSeni2() {
    const imageMotorik2 = document.querySelector("#photoSeni2");
    const imagePreviewMotorik2 = document.querySelector(".photo-seni2");
    // const imgPreview = document.querySelector('.img-preview2');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik2.files[0]);

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
            ? imagePreviewMotorik2.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik2
              )
            : imagePreviewMotorik2.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik2
              );
    };
}

function previewImageSeni3() {
    const imageMotorik3 = document.querySelector("#photoSeni3");
    const imagePreviewMotorik3 = document.querySelector(".photo-seni3");
    // const imgPreview3 = document.querySelector('.img-preview3');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik3.files[0]);

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
            ? imagePreviewMotorik3.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik3
              )
            : imagePreviewMotorik3.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik3
              );
    };
}

function previewImageSeni4() {
    const imageMotorik4 = document.querySelector("#photoSeni4");
    const imagePreviewMotorik4 = document.querySelector(".photo-seni4");
    // const imgPreview4 = document.querySelector('.img-preview4');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageMotorik4.files[0]);

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
            ? imagePreviewMotorik4.parentNode.replaceChild(
                  divImg,
                  imagePreviewMotorik4
              )
            : imagePreviewMotorik4.parentNode.replaceChild(
                  div,
                  imagePreviewMotorik4
              );
    };
}
