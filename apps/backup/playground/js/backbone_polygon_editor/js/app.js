require(['app/model', 'app/view', 'app/controller', 'app/Vertex'], function(model, view, controller, Vertex){
  // inital load

  // create first vertex
  model.add(new Vertex({
  	x: 100,
  	y: 100
  }));

	// listener to get model info
	model.on('add', function(addedVertex) {
		console.log(JSON.stringify(model));
	});
});
