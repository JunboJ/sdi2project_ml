function addtoList(mid, uid) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("btn_content").innerHTML = xmlhttp.responseText;
      }
  };
  xmlhttp.open("GET", "addtoList.php?mid="+mid+"&uid="+uid, true);
  xmlhttp.send();

}

//set footer to bottom
$(function () {
    function fixedfooter () {
        $("footer").removeClass("fix_bottom");
            var th = document.body.scrollHeight,
                wh = window.innerHeight;
        if (!(th > wh)) {
            $("footer").addClass("fix_bottom");
        }else{
            $("footer").removeClass("fix_bottom");
        }
    }
    fixedfooter();
    $(window).resize(fixedfooter);
});

//azure video
var myOptions = {
    "nativeControlsForTouch": false,
    controls: true,
    autoplay: true,
    width: "100%",
    height: "auto",
}
myPlayer = amp("azuremediaplayer", myOptions);
myPlayer.src([
        {
            "src": "//trailer-aueas.streaming.media.azure.net/a641d201-9b58-45ff-ab3a-cebd05d75cf5/forwebsite.ism/manifest",
            "type": "application/vnd.ms-sstr+xml"
        }
]);

