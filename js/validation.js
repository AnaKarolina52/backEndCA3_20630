
$(document).ready(e=>{

    $('#bookForm').submit(function(e) {
        console.log('Form Submitted');

        let type = $('#type').val(),
            size = $('#size').val(),
            price = $('#price').val(),
            published_date = $('#published_date').val();

        $('#typeError').text('');
        $('#sizeError').text('');
        $('#priceError').text('');
        $('#publishedError').numeric('');

        let valid = true;

        if(type === '' || type==='undefined'){

            valid = false;
            $('#typeError').text("Type is invalid");

        }
        if(size === '' || size==='undefined'){
            valid = false;
            $('#sizeError').text("Size is invalid");
        }
        if(price === '' || price==='undefined'){
            valid = false;
            $('#priceError').numeric("Price is invalid");
        }
        if(published_date === '' || published_date==='undefined'){
            var regex = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

            if(!regex.test(published_date)){
                valid = false;  
                console.log('Regex is false');        
                $('#publishedError').text("Published date is invalid");
            }
        }

        if(!valid){
            e.preventDefault();
        }
     });
    
});