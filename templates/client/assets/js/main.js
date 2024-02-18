// Button course
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}

// My course
document.getElementById("myButton").addEventListener("click", function () {
    var dropdown = document.getElementById("myDropdown");
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
});

// Sự kiện click bất kỳ nơi nào trên màn hình
window.addEventListener("click", (event) => {
    const modal = document.getElementById("myDropdown");
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

//
document.getElementById("avatar").addEventListener("click", function () {
    var dropdownAvatar = document.getElementById("avatarDrop");
    if (dropdownAvatar.style.display === "block") {
        dropdownAvatar.style.display = "none";
    } else {
        dropdownAvatar.style.display = "block";
    }
});

// Toast
function showToast() {
    const toast = document.getElementById("toast");
    toast.style.opacity = 1;
    toast.classList.remove("hidden");

    setTimeout(function () {
        toast.style.opacity = 0;
        toast.classList.add("hidden");
    }, 3000);
}

// Active menu

// Xử lý Ckeditor với class
let classTextarea = document.querySelectorAll(".editor");
if (classTextarea !== null) {
    classTextarea.forEach((item, index) => {
        item.id = "editor_" + (index + 1);
        CKEDITOR.replace(item.id);
    });
}
//Xử lý mở popup ckfinder

function openCkfinder() {
    let chooseImages = document.querySelectorAll(".choose-image");
    if (chooseImages !== null) {
        chooseImages.forEach(function (item) {
            item.addEventListener("click", function () {
                let parentElementObject = this.parentElement;
                while (parentElementObject) {
                    parentElementObject = parentElementObject.parentElement;

                    if (
                        parentElementObject.classList.contains("ckfinder-group")
                    ) {
                        break;
                    }
                }

                CKFinder.popup({
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function (finder) {
                        finder.on("files:choose", function (evt) {
                            let fileUrl = evt.data.files.first().getUrl(); //Xử lý chèn link ảnh vào input

                            parentElementObject.querySelector(
                                ".image-render"
                            ).value = fileUrl;
                        });
                        finder.on("file:choose:resizedImage", function (evt) {
                            let fileUrl = evt.data.resizedUrl;
                            //Xử lý chèn link ảnh vào input
                            parentElementObject.querySelector(
                                ".image-render"
                            ).value = fileUrl;
                        });
                    },
                });
            });
        });
    }
}

openCkfinder();

// Tuyết rơi
// document.addEventListener("DOMContentLoaded", function () {
//     const snowfall = document.querySelector(".snowfall");
//     const numFlakes = 50;

//     for (let i = 0; i < numFlakes; i++) {
//         const flake = document.createElement("div");
//         flake.className = "flake";
//         flake.style.left = Math.random() * 95 + "vw";
//         flake.style.animationDuration = Math.random() * 10 + 1 + "s";
//         flake.style.animationDelay = -Math.random() * 2 + "s";
//         snowfall.appendChild(flake);
//     }
// });
