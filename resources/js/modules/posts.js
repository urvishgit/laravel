exports.module = (function () {

  /**
   * @var string Name of the module
   */
  var _name = 'posts';

  /**
   * @return string Name of the module
   */
  var getName = function() {
    return _name;
  }

  
  /**
   * Get Posts by query
   */
  var _getPosts = function(query, orderBy='id', order='desc', pageNo = 1) {
    
    var url = $('#pagination-path').val();
    
    console.log(url);

    axios.get( url+"?q=" + query+'&orderBy='+orderBy+'&order='+order+'&pageNo='+pageNo, {
    }).then((response)=>{
      $('#data').html('');
      $('#data').html(response.data.html);
      
      $("ul.pagination > li.page-item > a.page-link").on("click", function(){

        var pageNo = $(this).attr("data-page-no");
        $('#page-no').val(pageNo);

        var query = $('#q').val();
        var order = $('#order').val();
        var orderBy = $('#order-by').val();
        
        _getPosts(query, orderBy, order, pageNo);

      });

    }).catch((error)=>{
      console.log(error.response);
    });
  }

  /**
   * Actions to perform when document is ready according to jquery
   */
  var _ready = function() {
    
    $(document).on('keyup', '#q', function(){
      var query = $(this).val();
      _getPosts(query);
    });

    $('document').ready(function() {
      
      $("ul.pagination > li.page-item > a.page-link").on("click", function(){

        var pageNo = $(this).attr("data-page-no");
        $('#page-no').val(pageNo);

        var query = $('#q').val();
        var order = $('#order').val();
        var orderBy = $('#order-by').val();
        
        _getPosts(query, orderBy, order, pageNo);

      });

      $(".data-ordering").on("click", function(){
        
        $('.data-list div').each(function(index) {
          $( "div" ).removeClass("data-ordering");
          $( "div" ).removeClass("data-ordering-asc");
          $( "div" ).removeClass("data-ordering-desc");
          $( "div" ).addClass("data-ordering");
        });

        var query = $('#q').val();
        var orderBy = $(this).attr("data-order-by");
        var order = $(this).attr("data-order");
        var pageNo = $('#page-no').val();

        if(order.length == 0 || order == 'desc') {
          order = 'asc';
          $('#order').val(order);
          $('#order-by').val(orderBy);
          $(this).attr("data-order", order);
          $(this).removeClass("data-ordering");
          $(this).addClass("data-ordering-asc");
        } else {
          order = 'desc';
          $('#order').val(order);
          $('#order-by').val(orderBy);
          $(this).attr("data-order", order);
          $(this).removeClass("data-ordering");
          $(this).removeClass("data-ordering-asc");
          $(this).addClass("data-ordering-desc");
        }
        _getPosts(query, orderBy, order, pageNo);
      });


      $("#published_at").flatpickr({
          enableTime: true,
          dateFormat: "Y-m-d H:i",
      });

      $('.tag-selector').select2({
        placeholder: 'Select post tags',
        allowClear: true
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
