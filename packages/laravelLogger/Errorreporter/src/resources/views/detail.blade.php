<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>CodePen - Material-Design-Cards with truncating labels and fixed elements</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
      body {
  padding: 120px;
}

h4 {
  font-family: "Roboto";
  font-weight: 500;
  font-size: 14px;
  color: #aeaeae;
  text-transform: uppercase;
  margin: 0;
}

hr {
  margin-bottom: 16px;
  border: 1px solid #eaeaea;
}

.border-card {
  background: #fff;
  margin-bottom: 30px;
  display: flex;
  align-items: center;
  font-family: "Roboto";
  font-size: 14px;
  padding: 12px 16px;
  cursor: pointer;
  border-radius: 4px;
  border: 1px solid #eaeaea;
  box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);
  transition: all 0.25s ease;
}
.border-card:hover {
  -webkit-transform: translateY(-1px);
          transform: translateY(-1px);
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.1);
}
.border-card.over {
  background: rgba(70, 222, 151, 0.15);
  padding-top: 24px;
  padding-bottom: 24px;
  border: 2px solid #47DE97;
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0), 0 5px 10px 0 rgba(0, 0, 0, 0);
}
.border-card.over .card-type-icon {
  color: #47DE97 !important;
}
.border-card.over p {
  color: #47DE97 !important;
}

.content-wrapper {
  display: flex;
  justify-content: flex-start;
  width: 100%;
  white-space: nowrap;
  overflow: hidden;
  transition: all 0.25s ease;
}

.min-gap {
  flex: 0 0 40px;
}

.card-type-icon {
  flex-grow: 0;
  flex-shrink: 0;
  margin-right: 16px;
  font-weight: 400;
  color: #323232;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 40px;
  font-size: 14px;
  transition: all 0.25s ease;
}
.card-type-icon.with-border {
  color: #aeaeae;
  border: 1px solid #eaeaea;
}
.card-type-icon i {
  line-height: 40px;
}

.label-group {
  white-space: nowrap;
  overflow: hidden;
}
.label-group.fixed {
  flex-shrink: 0;
}
.label-group p {
  margin: 0px;
  line-height: 21px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.label-group p.title {
  color: #323232;
  font-weight: 500;
}
.label-group p.title.cta {
  text-transform: uppercase;
}
.label-group p.caption {
  font-weight: 400;
  color: #aeaeae;
}

.end-icon {
  margin-left: 16px;
}

    </style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<h4>Card with primary and other information</h4>
<hr>
<div class="border-card">
<div class="card-type-icon with-border">1</div>
<div class="content-wrapper">
<div class="label-group fixed">
<p class="title">EG links</p>
<p class="caption">Einheit</p>
</div>
<div class="min-gap"></div>
<div class="label-group">
<p class="title">Test</p>
<p class="caption">Eigentümer</p>
</div>
<div class="min-gap"></div>
<div class="label-group">
<p class="title">Alexander Oemisch</p>
<p class="caption">Mieter</p>
</div>
</a>
</div>
<i class="material-icons end-icon">more_vert</i>
</div>
<div class="border-card">
<div class="card-type-icon with-border">1</div>
<div class="content-wrapper">
<div class="label-group fixed">
<p class="title">EG links</p>
<p class="caption">Einheit</p>
</div>
<div class="min-gap"></div>
<div class="label-group">
<p class="title">Marc-Philipp Weber</p>
<p class="caption">Eigentümer</p>
</div>
<div class="min-gap"></div>
<div class="label-group">
<p class="title">Alexander Oemisch</p>
<p class="caption">Mieter</p>
</div>
</a>
</div>
<i class="material-icons end-icon">more_vert</i>
</div>
<div class="border-card">
<div class="card-type-icon with-border">1</div>
<div class="content-wrapper">
<div class="label-group fixed">
<p class="title">EG links</p>
<p class="caption">Einheit</p>
</div>
<div class="min-gap"></div>
<div class="label-group">
<p class="title">Marc-Philipp Weber</p>
<p class="caption">Eigentümer</p>
</div>
<div class="min-gap"></div>
<div class="label-group">
<p class="title">Alexander Oemisch</p>
<p class="caption">Mieter</p>
</div>
</a>
</div>
<i class="material-icons end-icon">more_vert</i>
</div>
<h4>Card with one information</h4>
<hr>
<div class="border-card" draggable=true>
<div class="card-type-icon with-border"><i class="material-icons">insert_drive_file</i></div>
<div class="content-wrapper">
<div class="label-group">
<p class="title">Einladung zur Eigentümerversammlung</p>
<p class="caption">Dokument</p>
</div>
</div>
<i class="material-icons">more_vert</i>
</div>
<h4>Call-To-Action Card (try dragging a file over it)</h4>
<hr>
<div class="border-card droppable">
<div class="card-type-icon"><i class="material-icons">cloud_upload</i></div>
<div class="content-wrapper">
<div class="label-group">
<p class="title cta">Wartungsvertrag hochladen</p>
</div>
</div>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script id="rendered-js">
      $('.droppable').bind('dragover', function (e) {
  $(this).addClass('over');

  if (e.originalEvent.preventDefault)
  e.preventDefault();

  e.originalEvent.dataTransfer.dropEffect = 'copy';
  return false;
});


$('.droppable').bind('dragenter', function (e) {
  $(this).addClass('over');
});

$('.droppable').bind('dragleave', function (e) {
  $(this).removeClass('over');
});


$('.droppable').bind('drop', function (e) {
  $(this).removeClass('over');

  if (e.originalEvent.stopPropagation)
  e.originalEvent.stopPropagation();

  var stuff = $(e.originalEvent.dataTransfer.getData('stuff'));
  stuff.appendTo(this);
  return false;
});
      //# sourceURL=pen.js
    </script>
</body>
</html>
