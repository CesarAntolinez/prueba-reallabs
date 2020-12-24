$(document).ready(function (e) {
     $('#form-number').submit(function (e) {
         e.preventDefault();
         var form = $(this);
         $.ajax({
             'url': form.attr('action'),
             'method': 'post',
             'dataType': 'json',
             'data': form.serialize(),
             'success': function (data) {
                 if (data.status === 'success')
                 {
                     $('#count-step').html(data.data.count);
                     $('#step').html(data.data.step);
                 }else{
                     $('#count-step').html('');
                     $('#step').html('error en el proceso');
                 }
             }
         });
     });

     $('#btn-complete').click(function (e) {
         var btn = $(this);
         console.log(btn.data('url'));
         $.ajax({
             'url': btn.data('url'),
             'method': 'GET',
             'dataType': 'json',
             'success': function (data) {
                 console.log(data);

                 if (data.status === 'success')
                 {
                     $('#complete-numbers tbody').html('');
                     $.each(data.data,function (index, item) {
                         $('#complete-numbers tbody').append('<tr>' +
                             '<td>' + item.number + '</td>' +
                             '<td>' + item.count + '</td>' +
                             '<td>' + item.step + '</td>' +
                             '</tr>');
                     });
                 }
             }
         });
     });
});