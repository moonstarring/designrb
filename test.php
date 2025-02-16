<!DOCTYPE html>
<html>
<head>
  <title>Hover and Replace (Using IDs)</title>
  <style>
    #hoverableElement {
      width: 200px;
      height: 100px;
      background-color: lightblue;
      text-align: center;
      line-height: 100px;
      cursor: pointer;
      display: none; /* Hidden by default */
    }

    #hiddenContentElement {
      width: 200px;
      height: 100px;
      background-color: lightcoral;
      text-align: center;
      line-height: 100px;
      margin-top: 10px;
      cursor: pointer; /*Make it Hoverable*/
    }
  </style>
</head>
<body>

  <div id="hoverableElement">Hover Me</div>
  <div id="hiddenContentElement">Hover Over Me</div>

  <script>
    const hoverableElement = document.getElementById('hoverableElement');
    const hiddenContentElement = document.getElementById('hiddenContentElement');

    hiddenContentElement.addEventListener('mouseenter', function() {
      hiddenContentElement.style.display = 'none';
      hoverableElement.style.display = 'block';
    });

    hiddenContentElement.addEventListener('mouseleave', function() {
       hoverableElement.style.display = 'none'; //Hide the hoverable
       hiddenContentElement.style.display = 'block'; //Show the hidden content
    });
  </script>

</body>
</html>