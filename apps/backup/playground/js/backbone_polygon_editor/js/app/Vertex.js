// capatalize because resembles a class (prototype)
define([], function(){
  // modular level var
  var radius = 10;

  // create a custom object {} within the model
  return Backbone.Model.extend({
    // properties
    radius: radius,

    // methods
    contains: function(x, y){
      // get this. object instance
      var dx = x - this.get('x'),
          dy = y - this.get('y'),
          distance = Math.sqrt(dx*dx + dy*dy);
      return distance <= radius;
    }
  });
});
