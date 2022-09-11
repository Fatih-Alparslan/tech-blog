

function yorumGonder(){
  var degerler = $("#yorumForm").serialize();//yorum formdaki namelerin hepsini al

  $.ajax({
    type : "POST",
    url : "yorum-yap.php",
    data : degerler,

    success: function(sonuc){
      if (sonuc == "bos") {
        swal("Dikkat!", "Lütfen boş alan bırakmayınız!","warning");
      }else if (sonuc == "no") {
        swal("Hata!", "Yorum yapılırken bir hata oluştu!","error");
      }else if (sonuc == "yes") {
        swal({
          title : "Tebrikler !",
          text : "Yorumunuz başarıyla gönderildi...",
          type : "success",
          html : true,
          timer : 2000},
          function (){
            location.reload();
          }
        );
      }
    }
  });
}

function iletisimGonder(){
  var degerler = $("#iletisimForm").serialize();//yorum formdaki namelerin hepsini al

  $.ajax({
    type : "POST",
    url : "mesaj-gonder.php",
    data : degerler,

    success: function(sonuc){
      if (sonuc == "bos") {
        swal("Dikkat!", "Lütfen boş alan bırakmayınız!","warning");
      }else if (sonuc == "no") {
        swal("Hata!", "Yorum yapılırken bir hata oluştu!","error");
      }else if (sonuc == "yes") {
        swal({
          title : "Tebrikler !",
          text : "Yorumunuz başarıyla gönderildi...",
          type : "success",
          html : true,
          timer : 2000},
          function (){
            location.reload();
          }
        );
      }
    }
  });
}
