define(['app/model'], function(model){
  // id's on the html create global variable in JS (canvas)
  var c = canvas.getContext('2d');

  // redraw
  function render(){
    // reset
    c.clearRect(0, 0, canvas.width, canvas.height);

    // draw each line
    renderLines();

    // draw each vertex (below so line is behind the vertex)
    model.each(renderVertex);
  }

  function renderLines() {
    c.beginPath();
    var prev = model.last();
    c.moveTo(prev.get('x'), prev.get('y'));
    model.each(function(vertex){
      c.lineTo(vertex.get('x'), vertex.get('y'));
    });
    c.closePath();
    c.fillStyle = 'gray';
    c.fill();
    c.stroke();
  }

  function renderVertex(vertex){
    var x = vertex.get('x'),
        y = vertex.get('y'),
        radius = vertex.radius;
    c.beginPath();
    c.arc(x, y, radius, 0, 2 * Math.PI);
    c.closePath();
    c.fillStyle = 'black';
    c.fill();
  }

  // any changes causes the view to be redrawn
  model.on('add', render);
  model.on('remove', render);
  model.on('change', render);
});
