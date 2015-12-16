define(['app/Vertex'], function(Vertex){
	// create collection for the models
  var Vertices = Backbone.Collection.extend({
  	// only have 1 model called Vertex
    model: Vertex
  });

  // return the collection to be used by all other files which import this file model.
  return new Vertices();
});
