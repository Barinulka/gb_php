$(function () {
  let links = $(".open");

  links.on("click", function (e) {
    e.preventDefault();
    let elem = $(this);
    let img = elem.find("img").attr("src");

    loadPopup(img);
  });

  let close = $(".close");

  close.on("click", function (e) {
    e.preventDefault();
    let elem = $(this);

    $(".popup").hide();
    $("body").removeClass("pup");
  });
});

function loadPopup(img) {
  let popup = $(".popup");
  popup.find(".image").attr("src", img);

  $("body").addClass("pup");

  popup.show();
}
