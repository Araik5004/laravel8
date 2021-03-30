.redactor_box {

	position: relative;

	border: 1px solid #ddd;

	overflow: visible;

}

.redactor_box, .redactor_box textarea {

	background-color: #fff;

}



body .redactor_air {

	position: absolute;

	border: 1px solid #ddd;

	border-bottom: none;

	z-index: 2;

}



/*

	Fullscreen

*/

body .redactor_box_fullscreen {

    left: 0;

    position: fixed;

    overflow: hidden;

    top: 0;

    width: 100%;

    z-index: 2000;

}



.redactor_box textarea {

	font-family: Menlo, Monaco, monospace, sans-serif;

	font-size: 13px;

	overflow: auto;

	resize: none;

	margin: 0;

	padding: 0;

	display: block;

	position: relative;

	z-index: 1004;

	outline: none;

	border: none;

	width: 100%;

}



.redactor_editor,

.redactor_editor:focus,

.redactor_editor div,

.redactor_editor p,

.redactor_editor ul,

.redactor_editor ol,

.redactor_editor table,

.redactor_editor dl,

.redactor_editor blockquote,

.redactor_editor pre,

.redactor_editor h1,

.redactor_editor h2,

.redactor_editor h3,

.redactor_editor h4,

.redactor_editor h5 {

	font-family: Arial, Helvetica, Verdana, Tahoma, sans-serif !important;

}



.redactor_editor code,

.redactor_editor pre {

	font-family: Menlo, Monaco, monospace, sans-serif !important;

}



.redactor_editor,

.redactor_editor:focus,

.redactor_editor div,

.redactor_editor p,

.redactor_editor ul,

.redactor_editor ol,

.redactor_editor table,

.redactor_editor dl,

.redactor_editor blockquote,

.redactor_editor pre {

	font-size: 15px !important;

	line-height: 1.45em !important;

}



.redactor_editor, .redactor_editor:focus {

	position: relative;

	outline: none;

	box-shadow: none !important;

	padding: 15px !important;

	margin: 0 !important;

	background: none;

	background: #fff !important;

	overflow: auto;

	white-space: normal;

}

.redactor_editor a {

	color: #15c !important;

	text-decoration: underline !important;

}



.redactor_editor object,

.redactor_editor embed,

.redactor_editor video,

.redactor_editor img {

	width: auto;

	max-width: 100%;

}

.redactor_editor video,

.redactor_editor img {

	height: auto;

}



.redactor_editor div,

.redactor_editor p,

.redactor_editor ul,

.redactor_editor ol,

.redactor_editor table,

.redactor_editor dl,

.redactor_editor blockquote,

.redactor_editor pre {

	box-shadow: none !important;

	background: none !important;

	margin: 0 !important;

	margin-bottom: 15px !important;

	border: none;

}

.redactor_editor iframe,

.redactor_editor object,

.redactor_editor hr {

	margin-bottom: 15px !important;

}

.redactor_editor blockquote {

	margin-left: 3em !important;

	font-style: italic !important;

	color: #777;

}

.redactor_editor ul,

.redactor_editor ol {

	padding-left: 2em !important;

}

.redactor_editor ul ul,

.redactor_editor ol ol,

.redactor_editor ul ol,

.redactor_editor ol ul {

	border: none;

	margin: 2px !important;

	padding: 0 !important;

	padding-left: 2em !important;

}

.redactor_editor dl dt { font-weight: bold; }

.redactor_editor dd { margin-left: 1em;}



.redactor_editor table {

	border-collapse: collapse;

	font-size: 1em !important;

}

.redactor_editor table td {

	border: 1px solid #ddd;

	padding: 5px !important;

	vertical-align: top;

}

.redactor_editor table thead td {

	border-bottom: 2px solid #000 !important;

	font-weight: bold !important;

}

.redactor_editor code {

	background-color: #d8d7d7 !important;

}

.redactor_editor pre {

	font-size: 90% !important;

	background: #f8f8f8 !important;

	border: 1px solid #ddd !important;

	border-radius: 3px !important;

	padding: 1em !important;

	white-space: pre;

	overflow: auto;

}

.redactor_editor hr {

  display: block;

  height: 1px;

  border: 0;

  border-top: 1px solid #ccc;

}



.redactor_editor h1,

.redactor_editor h2,

.redactor_editor h3,

.redactor_editor h4,

.redactor_editor h5 {

	color: #000;

	background: none;

	margin: 0 !important;

	padding: 0 !important;

	font-weight: bold;

}



.redactor_editor h1 {

	font-size: 36px !important;

	line-height: 40px !important;

	margin-bottom: 10px !important;

}

.redactor_editor h2 {

	font-size: 30px !important;

	line-height: 38px !important;

	margin-bottom: 15px !important;

}

.redactor_editor h3 {

	font-size: 24px !important;

	line-height: 30px !important;

	margin-bottom: 10px !important;

}

.redactor_editor h4 {

	font-size: 18px !important;

	line-height: 24px !important;

	margin-bottom: 10px !important;

}

.redactor_editor h5 {

	font-size: 1em !important;

	margin-bottom: 10px !important;

}



.redactor_editor.redactor_editor_wym {

	background: #f6f6f6 !important;

	padding: 5px 15px !important;

}

.redactor_editor_wym div,

.redactor_editor_wym p,

.redactor_editor_wym ul,

.redactor_editor_wym ol,

.redactor_editor_wym table,

.redactor_editor_wym dl,

.redactor_editor_wym pre,

.redactor_editor_wym h1,

.redactor_editor_wym h2,

.redactor_editor_wym h3,

.redactor_editor_wym h4,

.redactor_editor_wym h5,

.redactor_editor_wym blockquote {

	background-color: #fff !important;

	border: 1px solid #e4e4e4 !important;

	padding: 10px !important;

	margin: 10px 0 !important;

}

.redactor_editor_wym ul,

.redactor_editor_wym ol {

	padding-left: 2em !important;

}





/*

	TOOLBAR

*/

.redactor_toolbar {

	font-family: Helvetica, Arial, Verdana, Tahoma, sans-serif !important;

	position: relative;

	left: 0;

	top: 0;

	margin: 0 !important;

	padding: 0 !important;

	padding-left: 2px !important;

	line-height: 0 !important;

	list-style: none !important;

	font-size: 0;

	background: #f1f1f1;

	background: -moz-linear-gradient(top,  #f1f1f1 0%, #e2e2e2 100%);

	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f1f1f1), color-stop(100%,#e2e2e2));

	background: -webkit-linear-gradient(top,  #f1f1f1 0%,#e2e2e2 100%);

	background: -o-linear-gradient(top,  #f1f1f1 0%,#e2e2e2 100%);

	background: -ms-linear-gradient(top,  #f1f1f1 0%,#e2e2e2 100%);

	background: linear-gradient(to bottom,  #f1f1f1 0%,#e2e2e2 100%);

	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1f1f1', endColorstr='#e2e2e2',GradientType=0 );

	overflow: hidden !important;

	height: 32px !important;

	border-bottom: 1px solid #bbb;

}

body .redactor_air .redactor_toolbar {

	padding-right: 2px !important;

}

.redactor_toolbar li {

	float: left !important;

	margin: 0 !important;

	padding: 3px 1px;

	padding-right: 0;

	list-style: none !important;

	outline: none;

}

.redactor_toolbar li.redactor_separator {

	float: left;

	height: 34px;

	border-left: 1px solid #d3d3d3;

	border-right: 1px solid #f1f1f1;

	padding: 0;

	margin: 0 2px 0 3px !important;

}

.redactor_toolbar li a {

	width: 25px;

	height: 25px;

	border: 1px solid transparent;

	* border: 1px solid #eee;

	display: block;

	line-height: 0;

	font-size: 0;

	cursor: pointer;

	zoom: 1;

	outline: none;

	text-decoration: none;

}

.redactor_toolbar li.redactor_btn_right {

	float: none;

	float: right !important;

}

.redactor_toolbar li a {

	display: block;

	text-indent: -9999px;

	background-image: url(data:image/png;base64,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);

	background-repeat: no-repeat;

	background-position: 0;

}

@media all and (-webkit-min-device-pixel-ratio: 1.5) {



	.redactor_toolbar li a {

		background-image: url(data:image/png;base64,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);

		background-size: auto 25px;

	}



}



.redactor_toolbar li a:hover {

	border-color: #98a6ba;

	background-color: #dde4ef;

	outline: none;

}

.redactor_toolbar li a:active, .redactor_toolbar li a.redactor_act {

	border-color: #b5b5b5;

	background-color: #ddd;

	outline: none;

}





/*

	BUTTONS

	step 25px

*/

body .redactor_toolbar li a.redactor_btn_html				{ background-position: 0px; }

body .redactor_toolbar li a.redactor_btn_formatting		    { background-position: -25px; }

body .redactor_toolbar li a.redactor_btn_bold				{ background-position: -50px; }

body .redactor_toolbar li a.redactor_btn_italic			    { background-position: -75px; }

body .redactor_toolbar li a.redactor_btn_deleted		 	{ background-position: -500px; }

body .redactor_toolbar li a.redactor_btn_unorderedlist 	    { background-position: -100px; }

body .redactor_toolbar li a.redactor_btn_orderedlist   	    { background-position: -125px; }

body .redactor_toolbar li a.redactor_btn_outdent	 		{ background-position: -150px; }

body .redactor_toolbar li a.redactor_btn_indent		 	  	{ background-position: -175px; }

body .redactor_toolbar li a.redactor_btn_image		 		{ background-position: -200px; }

body .redactor_toolbar li a.redactor_btn_video		 		{ background-position: -225px; }

body .redactor_toolbar li a.redactor_btn_file		 		{ background-position: -250px; }

body .redactor_toolbar li a.redactor_btn_table		 		{ background-position: -275px; }

body .redactor_toolbar li a.redactor_btn_link		 		{ background-position: -300px; }

body .redactor_toolbar li a.redactor_btn_fontcolor		 	{ background-position: -325px; }

body .redactor_toolbar li a.redactor_btn_backcolor		 	{ background-position: -350px; }

body .redactor_toolbar li a.redactor_btn_alignleft		  	{ background-position: -375px; }

body .redactor_toolbar li a.redactor_btn_aligncenter		{ background-position: -400px; }

body .redactor_toolbar li a.redactor_btn_alignright		  	{ background-position: -425px; }

body .redactor_toolbar li a.redactor_btn_justify		 	{ background-position: -450px; }

body .redactor_toolbar li a.redactor_btn_horizontalrule 	{ background-position: -475px; }

body .redactor_toolbar li a.redactor_btn_underline		 	{ background-position: -525px; }



body .redactor_toolbar li a.redactor_btn_fullscreen		 	{ background-position: -550px; }

body .redactor_toolbar li a.redactor_btn_normalscreen		{ background-position: -575px; }

body .redactor_toolbar li a.redactor_btn_clips		 		{ background-position: -600px; }



body .redactor_toolbar li a.redactor_btn_alignment	 		{ background-position: -625px; }



/*

	Toolbar classes

*/

.redactor_format_blockquote {

	font-style: italic;

	color: #666 !important;

	padding-left: 10px;

}

.redactor_format_pre {

	font-family: monospace, sans-serif;

}

.redactor_format_h1, .redactor_format_h2, .redactor_format_h3, .redactor_format_h4 {

	font-weight: bold;

}

.redactor_format_h1 {

	font-size: 30px;

	line-height: 36px;

}

.redactor_format_h2 {

	font-size: 24px;

	line-height: 36px;

}

.redactor_format_h3 {

	font-size: 20px;

	line-height: 30px;

}

.redactor_format_h4 {

	font-size: 16px;

	line-height: 26px;

}



/*

	DROPDOWN

*/

.redactor_dropdown {

	font-family: Helvetica, Arial, Verdana, Tahoma, sans-serif;

	top: 28px;

	left: 0;

	z-index: 2004;

	position: absolute;

	width: 200px;

	background-color: #fff;

	border: 1px solid #ccc;

	font-size: 13px;

	-webkit-box-shadow: 0 2px 4px #ccc;

	-moz-box-shadow: 0 2px 4px #ccc;

	box-shadow: 0 2px 4px #ccc;

	line-height: 21px;

	padding: 10px;

}

.redactor_separator_drop {

	border-top: 1px solid #ddd;

	padding: 0 !important;

	line-height: 0;

	font-size: 0;

}

.redactor_dropdown a {

	display: block;

	color: #000;

	padding: 3px 5px;

	text-decoration: none;

}

.redactor_dropdown a:hover {

	color: #444 !important;

	text-decoration: none;

	background-color: #dde4ef;

}



/* ColorPicker */

.redactor_color_link {

	padding: 0 !important;

	width: 15px !important;

	height: 15px !important;

	box-shadow: 0 1px 2px rgba(0, 0, 0, .2) inset !important;

	border-radius: 4px !important;

	float: left !important;

	border: 2px solid #fff !important;

	font-size: 0;

}

.redactor_color_none {

	font-size: 11px;

}







/* MODAL */

#redactor_modal_overlay {

	position: fixed;

	margin: auto;

	top: 0;

	left: 0;

	width: 100%;

	height: 100%;

	z-index: 50000;



	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";

	filter:alpha(opacity=50);

	opacity: 0.50;



	background-color: #333 !important;

}



#redactor_modal {

	background: #f7f7f7;

	background: -moz-linear-gradient(top,  #f7f7f7 0%, #e2e2e2 100%);

	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#e2e2e2));

	background: -webkit-linear-gradient(top,  #f7f7f7 0%,#e2e2e2 100%);

	background: -o-linear-gradient(top,  #f7f7f7 0%,#e2e2e2 100%);

	background: -ms-linear-gradient(top,  #f7f7f7 0%,#e2e2e2 100%);

	background: linear-gradient(to bottom,  #f7f7f7 0%,#e2e2e2 100%);

	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7f7', endColorstr='#e2e2e2',GradientType=0 );

	text-shadow: 0 1px 0 #fff;

	padding: 0;

	position: fixed;

	top: 50%;

	left: 50%;

	box-shadow: 0px 5px 60px #000;

  	border-radius: 3px;

  	z-index: 50001;

	font-family: Helvetica, Arial, Verdana, Tahoma, sans-serif;

	font-size: 12px !important;

	color: #000;

}

#redactor_modal_header {

	padding: 11px 30px 0 15px;

	font-size: 12px;

	border-radius: 3px 3px 0 0;

	font-weight: bold;

}

#redactor_modal_content {

	padding: 20px 30px;



}

#redactor_modal_close {

	position: absolute;

	right: 5px;

	top: 5px;

	font-size: 20px;

	width: 20px;

	height: 20px;

	color: #777;

	cursor: pointer;

}

#redactor_modal_close:hover {

	color: #000;

}

#redactor_modal label {

	margin: 10px 0 3px 0 !important;

	padding: 0 !important;

	float: none !important;

	display: block !important;

}

#redactor_modal textarea {

	margin-top: 4px;

	display: block;

}

.redactor_input  {

	width: 99%;

	font-size: 14px;

}

.redactor_modal_box {

	height: 350px;

	overflow: auto;

	margin-bottom: 10px;

}

#redactor_image_box {

	height: 270px;

	overflow: auto;

	margin-bottom: 10px;

}

#redactor_image_box_select {

	display: block;

	width: 200px;

	margin-bottom: 15px;

}

#redactor_image_box img {

	margin-right: 10px;

	margin-bottom: 10px;

	cursor: pointer;

	max-width: 100px;

}

#redactor_tabs {

	margin-bottom: 18px;

}

#redactor_tabs a {

	display: inline-block;

	border: 1px solid #d2d2d2;

	padding: 4px 14px;

	font-size: 12px;

	background-color: #fff;

	text-decoration: none;

	color: #000;

	line-height: 1;

	border-radius: 10px;

	margin-right: 5px;

}

#redactor_tabs a:hover, #redactor_tabs a.redactor_tabs_act {

	background-color: #ddd;

	padding: 5px 15px;

	box-shadow: 0 1px 2px rgba(0, 0, 0, .4) inset;

	border: none;

	text-shadow: 0 1px 0 #eee;

	color: #777 !important;

	text-decoration: none !important;

}

#redactor_modal_footer {

	padding: 9px 30px 20px 30px;

	border-radius: 0 0 3px 3px;

	text-align: right;

}



#redactor_modal input[type="radio"],

#redactor_modal input[type="checkbox"] {

	position: relative;

	top: -1px;

}

#redactor_modal input[type="text"],

#redactor_modal input[type="password"],

#redactor_modal input[type="email"],

#redactor_modal textarea {

	position: relative;

	z-index: 2;

	font-family: Helvetica, Arial, Tahoma, sans-serif;

	height: 23px;

	border: 1px solid #ccc;

	margin: 0;

	padding: 1px 2px;

	background-color: white;

	color: #333;

	font-size: 13px;

	line-height: 1;

	border-radius: 1px;

	box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2) inset;

	-webkit-transition: border 0.3s ease-in;

	-moz-transition: border 0.3s ease-in;

	-ms-transition: border 0.3s ease-in;

	-o-transition: border 0.3s ease-in;

	transition: border 0.3s ease-in;

}

#redactor_modal textarea {

	line-height: 1.4em;

}

#redactor_modal input:focus,

#redactor_modal textarea:focus {

	outline: none;

	border-color: #5ca9e4;

	box-shadow: 0 0 0 2px rgba(70, 161, 231, 0.3), 0 1px 2px rgba(0, 0, 0, 0.2) inset;

}



.redactor_modal_btn {

	margin-left: 8px;

	position: relative;

	cursor: pointer;

	outline: none;

	display: inline-block;

	text-align: center;

	text-decoration: none;

	font-family: Helvetica, Arial, Verdana, Tahoma, sans-serif;

	line-height: 1;

	font-size: 12px;

	font-weight: normal;

	padding: 6px 16px 5px 16px;

	border-radius: 4px;

	background-color: #f3f3f3;

	background-image: -moz-linear-gradient(top, #ffffff, #e1e1e1);

	background-image: -ms-linear-gradient(top, #ffffff, #e1e1e1);

	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e1e1e1));

	background-image: -webkit-linear-gradient(top, #ffffff, #e1e1e1);

	background-image: -o-linear-gradient(top, #ffffff, #e1e1e1);

	background-image: linear-gradient(top, #ffffff, #e1e1e1);

	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e1e1e1', GradientType=0);

	border: 1px solid #ccc;

	border-bottom-color: #aaa;

	box-shadow: 0 1px 1px rgba(0, 0, 0, .1);

	text-shadow: 0 1px 0px #ffffff;

	color: #000;

}

.redactor_modal_btn:hover {

	color: #555;

}

.redactor_modal_btn:hover {

	filter: none;

	background: none;

	background: #f3f3f3;

	text-shadow: 0 1px 0px rgba(255, 255, 255, 0.8);

	text-decoration: none;

}





/* Drag and Drop Area */

.redactor_droparea {

	position: relative;

    width: 100%;

    margin: auto;

    margin-bottom: 5px;

}

.redactor_droparea .redactor_dropareabox {

	z-index: 1;

	position: relative;

    text-align: center;

    width: 99%;

    background-color: #fff;

    padding: 60px 0;

    border: 2px dashed #bbb;

}

.redactor_droparea .redactor_dropareabox, .redactor_dropalternative {

    color: #555;

    font-size: 12px;

}

.redactor_dropalternative {

	margin: 4px 0 2px 0;

}

.redactor_dropareabox.hover {

    background: #efe3b8;

    border-color: #aaa;

}

.redactor_dropareabox.error {

    background: #f7e5e5;

    border-color: #dcc3c3;

}

.redactor_dropareabox.drop {

    background: #f4f4ee;

    border-color: #e0e5d6;

}