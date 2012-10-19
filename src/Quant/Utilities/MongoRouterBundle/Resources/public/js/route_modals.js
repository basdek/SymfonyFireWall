;(function ($, window, undefined) {
  'use strict';

  var $doc = $(document),
      Modernizr = window.Modernizr;

 $(document).foundationAlerts();

  //$.fn.foundationAlerts           ? $doc.foundationAlerts() : null;
  $.fn.foundationAccordion        ? $doc.foundationAccordion() : null;
  $.fn.foundationTooltips         ? $doc.foundationTooltips() : null;
  $('input, textarea').placeholder();
  
  
  $.fn.foundationButtons          ? $doc.foundationButtons() : null;
  
  
  $.fn.foundationNavigation       ? $doc.foundationNavigation() : null;
  
  
  $.fn.foundationTopBar           ? $doc.foundationTopBar() : null;
  
  $.fn.foundationCustomForms      ? $doc.foundationCustomForms() : null;
  $.fn.foundationMediaQueryViewer ? $doc.foundationMediaQueryViewer() : null;
  
    
    $.fn.foundationTabs             ? $doc.foundationTabs() : null;
    
  
    
    $("#featured").orbit();
    /*
    @TODO: something smart for the url on line 46.
    */
    $(window).load(function(){




        $('button.delete').click(function(){
            $.fn.clean();
            $('#modal_placeholder').append('<div id="deleteModal" class="reveal-modal"><h1>Are you sure?</h1>'
                +'<p>This action will be permanent, and can cause errors in your application.</p>'
                +'<button class="tiny button alert delete-confirm" data-id="'+$(this).data('id')+'">Delete</button>'
                +'<a class="close-reveal-modal">&#215;</a>');
            $('#deleteModal').reveal({
                closeOnBackgroundClick:false
            })
            $('button.delete-confirm').click(function(id){
                id = $(this).data('id');
                $.ajax({
                  url:'/qrouter/route/'+id+'/truncate'
                }).done(function(data, answerobject){               
                  $('#deleteModal').trigger('reveal:close');
                  $('tr[data-id="'+id+'"]').remove();
                  $.fn.clean();
                  $('#alert_placeholder').append('<div id="delete-success-'+id+'" class="alert-box six columns">Route deleted.  <a href="" class="close">&times;</a></div>');
                  $('#delete-success-'+id).fadeOut(2400, function(){
                    $('#delete-success-'+id).remove();
                  })
                })
            })
        })

        $('button.activate').click(function(){
            $.fn.clean();
            $('#modal_placeholder').append('<div id="activateModal" class="reveal-modal"><h1>Activate this route?</h1><p>Activating this route will make it available and will probably interfere with your current priority settings.</p>'+
            '<button class="tiny button success activate-confirm" data-id="'+$(this).data('id')+'">Ok</button><a class="close-reveal-modal">&#215;</a></div>');
            $('#activateModal').reveal({
                closeOnBackGroundClick:false
            })
            $('button.activate-confirm').click(function(id){
                id = $(this).data('id');
                $.ajax({
                    url: '/qrouter/route/'+id+'/activate'
                }).done(function(){
                  $('#activateModal').trigger('reveal:close');
                  $('tr[data-id="'+id+'"] button.activate').remove();
                  $('tr[data-id="'+id+'"] td.active').append('TRUE');
                  $.fn.clean();
                  $('#alert_placeholder').append('<div id="activate-success-'+id+'" class="alert-box six columns">Route activated succesfully.<a href="" class="close">&times;</a></div>')
                  $('#activate-success-'+id).fadeOut(2400, function(){
                    $('#activate-success-'+id).remove();
                  })
                })
            })
        })

        

        $.fn.clean = function()
        {
           $('#modal_placeholder .reveal-modal').remove();
           $('#modal_placeholder .reveal-modal-bg').remove();
           $('#alert_placeholder .alert-box').remove();
        }
    })
   
  // UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE8 SUPPORT AND ARE USING .block-grids
  // $('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'both'});
  // $('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'both'});
  // $('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'both'});
  // $('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'both'});

  // Hide address bar on mobile devices
  if (Modernizr.touch) {
    $(window).load(function () {
      setTimeout(function () {
        window.scrollTo(0, 1);
      }, 0);
    });
  }
  
})(jQuery, this);
