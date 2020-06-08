const selectElement = (s) => document.querySelector(s);

//open the menu when clicked
selectElement(".open").addEventListener("click", () => {
  selectElement(".nav-links").classList.add("active");
});

//close the menu when clicked
selectElement(".close").addEventListener("click", () => {
  selectElement(".nav-links").classList.remove("active");
});

$(document).ready(function () {
  $(".viewDetail").click(function () {
    $(this).closest("div.container").next().show();
    $(this).closest("div.container").hide();
  });
});

$(document).ready(function () {
  $(".closeDetail").click(function () {
    $(this).closest("div.detail").prev().show();
    $(this).closest("div.detail").hide();
  });
});

$(document).ready(function () {
  $(".nextDetail").click(function () {
    if ($(this).closest("div.detail").next().next().show()) {
      $(this).closest("div.detail").next().next().show();
    } else {
      $(this).closest("div.detail").next().next().toggle();
    }
    $(this).closest("div.detail").next().hide();
    $(this).closest("div.detail").prev().show();
    $(this).closest("div.detail").hide();
  });
});
