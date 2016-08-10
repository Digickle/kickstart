
CKEDITOR.stylesSet.add('mycustomstyleset',
  [
	// Block Styles
	{ name : 'Main Heading'		, element : 'h2'},
	{ name : 'Sub Heading'		, element : 'h3'},
	{ name : 'Quote'          , element : 'blockquote'},
//	{ name : 'Red Title'		, element : 'h3', styles : { 'color' : 'Red' } },

	// Inline Styles
	//{ name : 'Marker: Yellow'	, element : 'span', styles : { 'background-color' : 'Yellow' } },
	//{ name : 'Marker: Green'	, element : 'span', styles : { 'background-color' : 'Lime' } },

	// Object Styles
	{
		name : 'Image on Left',
		element : 'img',
		attributes :
		{
			'class' : 'align-left',
		}
	},
	{
		name : 'Image on Right',
		element : 'img',
		attributes :
		{
			'class' : 'align-right',
		}
	},
		
  ]);