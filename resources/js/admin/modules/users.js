exports.module = (function () {

  /**
   * @var string Name of the module
   */
  var _name = 'users';

  /**
   * @return string Name of the module
   */
  var getName = function() {
    return _name;
  }

  
  /**
   * Actions to perform when document is ready according to jquery
   */
  var _ready = function() {
    
    $('document').ready(function() {

      $( "#role" ).change(function() {
        var role = $(this).children("option:selected").val();
        $("#user_module_permission").removeClass("d-none");
        if(role == 'user') {
          $("#user_module_permission").addClass("d-none");
        }
      });

    });
    
  }

  /**
   * Triggered on module load to set jquery ready function and include public methods
   * @return array references to methods which should be available publicly for callbacks/parameters/etc.
   */
  var _init = function() {
    _ready();
    return {
      getName: getName,
    };
  };

  return _init();
})();
