/**
*	Dev.js
*	---------
* 	Here are some useful features.
*	-----------------------------------------------------
*	Copyright 2018 Maxim Poddubny (poddubny1425@gmail.com)
**/

/************************START***************************/

/**
*	Self-index in adding the element array[] = 'text';
*	Example:
*		var array = ['Vasya', 'Max'];
*		array = add_element_array(array, 'Vlad');
*		Result = ["Vasya", "Max", "Vlad"]
**/

function add_element_array(array, text, separator = false)
{
	var i, c, end_i;

	c = 0;
	i = array.length;
	if (separator)
	{
		text = text.split(separator);
		end_i = text.length + i;
		while (i < end_i)
			array[i++] = text[c++];
	}
	else if (!(separator))
		array[i] = text;
	return (array);
}

// var array = [];

// array = add_element_array(array, 'T1');
// array = add_element_array(array, 'T2');
// array = add_element_array(array, 'T3');

// array = add_element_array(array, 'T4, T5, T6, T7', ', ');
// console.log(array);


///////////////////////////////////////////////////////////

// $('#signup').click(function()
// {
// 	var inputEmail, inputUsername, inputFullname, inputPassword; 

// 	inputEmail = $.trim($('#email').val());
// 	inputUsername = $.trim($('#username').val());
// 	inputFullname = $.trim($('#fullname').val());
// 	inputPassword = $.trim($('#password').val());

// 	$.ajax({
// 	    type: 'POST',
// 	    url: '/signup',
// 	    data: 
// 	    {
// 	    	email : inputEmail,
// 	    	username : inputUsername,
// 	    	fullname : inputFullname,
// 	    	password : inputPassword
// 	    },
//         error: function(xhr, textStatus, error)
//         {
//                 console.log(xhr.responseText);
//         },
// 	    success: function (data)
// 	    {
// 	        // в data[0] - содержит значение $success
// 	        // в data[1] - содержит значение $login (или имя юзверя)
// 	        if(data[0])
// 	        {
// 	            alert(data[1] + ', вы зарегистрированы!');
// 	        }
// 	        else
// 	        {
// 	            alert('Хьюстон, у нас проблемы!');
// 	        }
// 	    },
// 	    dataType: 'json'
// 	});

// });