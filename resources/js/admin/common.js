exports.module = (function () {

  /**
   * @var string Name of the module
   */
  var _name = 'common';

  /**
   * @return string Name of the module
   */
  var getName = function() {
    return _name;
  }

  /**
   * Get Data by query
   */
  var _getSlug = function(title, id) {
    var url = $('#checkSlugUrl').val();
    axios.get( url + "?title=" + title + ' &id=' + id, {
    }).then((response)=>{
      $('#slug').val('');
      $('#slug').val(response.data.slug);
    }).catch((error)=>{
      console.log(error.response);
    });
  }
  
  /**
   * Actions to perform when document is ready according to jquery
   */
  var _ready = function() {
    
    $('document').ready(function() {
      
      $("#published_at").flatpickr({
          enableTime: true,
          dateFormat: "Y-m-d H:i",
      });

      $("#casestudy_date").flatpickr({
          enableTime: true,
          dateFormat: "Y-m-d",
      });

      $(".delete-record").on("click", function(){
        var delete_action = $('.delete-record').data('delete-url');
        
        if(delete_action)
        {
          $('#adminDataDeleteForm').attr('action', delete_action);
          $('#deleteModal').modal('show');
        } else {
          console.log('No action supply.');
        }
      });

      $('#title').change(function(e) {
        _getSlug($(this).val(), $('#id').val());
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
