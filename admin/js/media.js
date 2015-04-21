function play_video(id)
{
	var fileName;
	var desc;
	var display=document.getElementById("video");
	var title=document.getElementById("title");

	switch(id)
	{
		case 1:
		fileName="Dr_rajesh.mpg";
		desc="Dr. Rajesh";
		break;
		case 2:
		fileName="incisional_hernia.mpg";
		desc="Incisional hernia";
		break;
		case 3:
		fileName="incisional_hernia_corrected_with_mesh.mpg";
		desc="Incisional hernia corrected with mesh";
		break;
		case 4:
		fileName="most_advanced_clipping_surgery_for_tubal_ectopic.mpg";
		desc="Most advanced clipping surgery for tubal ectopic ";
		break;
		case 5:
		fileName="polycystic_ovary_drilling.mpg";
		desc="Polycystic ovary dilling";
		break;
		case 6:
		fileName="polyp.mpg";
		desc="Polyp";
		break;
		case 7:
		fileName="uterine_septum.mpg";
		desc="Uterine Septum";
		break;
		case 8:
		fileName="uterus_removed_bloodless.mpg";
		desc="Uterus removed bloodless";
		break;
		case 9:
		fileName="varicocoelectomy_for_males.mpg";
		desc="Varicocoelectomy for males";
		break;
		case 10:
		fileName="view_of_uterus_with_ovary_tube_and_abdominal_organs.mpg";
		desc="View of uterus with ovary tube and abdominal organs";
		break;
	}
		
	
	display.innerHTML='<object width="320" height="290" classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" id="mediaplayer1"><param name="Filename" value="video/'+ fileName +'"><param name="AutoStart" value="True"><param name="ShowControls" value="True"><param name="ShowStatusBar" value="False"><param name="ShowDisplay" value="False"><param name="AutoRewind" value="False"><embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/MediaPlayer/" width="320" height="290" src="video/'+ fileName +'" filename="video/'+ fileName +'" autostart="True" showcontrols="True" showstatusbar="False" showdisplay="False" autorewind="False"></embed></object>';
	
	title.innerHTML= desc;
	
}

function show_image(id)
{
	var fileName;
	var display=document.getElementById("photo");

	switch(id)
	{
		case 1:
		fileName="1.jpg";
		break;
		case 2:
		fileName="2.jpg";
		break;
		case 3:
		fileName="3.jpg";
		break;
		case 4:
		fileName="4.jpg";
		break;
		case 5:
		fileName="5.jpg";
		break;
		case 6:
		fileName="6.jpg";
		break;
		case 7:
		fileName="7.jpg";
		break;
		case 8:
		fileName="8.jpg";
		break;
		case 9:
		fileName="9.jpg";
		break;
		case 10:
		fileName="10.jpg";
		break;
		case 11:
		fileName="11.jpg";
		break;
		case 12:
		fileName="12.jpg";
		break;
	}

	display.innerHTML='<img src="images/gallery_images/'+fileName+'" alt="" width="400" height="301" />';

}