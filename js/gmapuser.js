var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
var my_Marker=[]; // สำหรับปักหมุด
var obj_marker;  // สำหรับเก็บค่าพิกัดและข้อมูลจากฐานข้อมูล
var infowindow=[]; // กำหนดตัวแปรสำหรับเก็บตัว popup แสดงรายละเอียดสถานที่  
var infowindowTmp; // กำหนดตัวแปรสำหรับเก็บลำดับของ infowindow ที่เปิดล่าสุด      
function initialize() { // ฟังก์ชันแสดงแผนที่  
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
    // กำหนดจุดเริ่มต้นของแผนที่  
    var my_Latlng  = new GGM.LatLng(17.633185912766887,100.09323859985352);  
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
    var my_DivObj=$("#map_canvas")[0];   
    // กำหนด Option ของแผนที่  
    var myOptions = {  
        zoom: 8, // กำหนดขนาดการ zoom  
        center: my_Latlng , // กำหนดจุดกึ่งกลาง  
        mapTypeId:GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่  
        mapTypeControlOptions:{ // การจัดรูปแบบส่วนควบคุมประเภทแผนที่  
            position:GGM.ControlPosition.TOP, // จัดตำแหน่ง  
            style:GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style   
        }  
    };  
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map  
    
    // ดึงข้อมูลจากฐานข้อมูลที่สร้างมาในรูปแบบไฟล์ json
    $.getJSON( "get_markeruser.php", function( data ) { 
        obj_marker=data; // เก็บค่าไว้ในตัวแปร ไว้ใช้งาน
         $.each(obj_marker,function(i,k){  // วนลูปแสดงการปักหมุด
                    var markerLatLng=new GGM.LatLng(obj_marker[i].latitude,obj_marker[i].longitude);  
                    my_Marker[i] = new GGM.Marker({ // สร้างตัว marker  
                        position:markerLatLng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
                        map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
                        title:obj_marker[i].base // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ  
                    });     
                     
                     // ส่วนของ infowindow สำหรับทดสอบ ดึงจากชื่อ titile
                     //infowindow[i] = new GGM.InfoWindow({// สร้าง infowindow ของแต่ละ marker เป็นแบบ array  
                       // content: my_Marker[i].getTitle() // ดึง title ในตัว marker มาแสดงใน infowindow  
                  //  });             
                     
                    //  กรณีนำไปประยุกต์ ดึงข้อมูลจากฐานข้อมูลมาแสดง  

                     // ส่วนของการกำหนด ให้เมื่อคลิกแต่ละ marker
                    GGM.event.addListener(my_Marker[i],"click", function(){ // เมื่อคลิกตัว marker แต่ละตัว  
                        if(infowindowTmp){ // ให้ตรวจสอบว่ามี infowindow ตัวไหนเปิดอยู่หรือไม่  
                            infowindow[infowindowTmp].close();  // ถ้ามีให้ปิด infowindow ที่เปิดอยู่  
                        }  
                        infowindow[i] = new GGM.InfoWindow({     
                          content:$.ajax({     
                              url:'placeDetailuser.php',//ใช้ ajax ใน jQuery ดึงข้อมูล     
                              data:'placeID='+obj_marker[i].idbase,  // ส่งค่าตัวแปร ไปดึงข้อมูลจากฐานข้อมูล  
                              async:false     
                          }).responseText     
                       });                           
                        infowindow[i].open(map,my_Marker[i]); // แสดง infowindow ของตัว marker ที่คลิก  
                        infowindowTmp=i; // เก็บ infowindow ที่เปิดไว้อ้างอิงใช้งาน  
                    });                                                
         });              
    });  
    
}  
$(function(){  
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว  
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api  
    // v=3.2&sensor=false&language=th&callback=initialize  
    //  v เวอร์ชัน่ 3.2  
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false  
    //  language ภาษา th ,en เป็นต้น  
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize  
    $("<script/>", {  
      "type": "text/javascript",  
      src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"  
    }).appendTo("body");      
});  
