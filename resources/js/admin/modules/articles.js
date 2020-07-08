exports.module = (function () {

  /**
   * @var string Name of the module
   */
  var _name = 'articles';

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

      $('.tag-selector').select2({
        placeholder: {
          id: '-1', // the value of the option
          text: 'Select article tags',
        },
        allowClear: true,
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
