<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>livingston Realty Good Living</title>
      <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
        .lists p{
          margin-bottom: 0px;
        }
      </style>
   </head>
   <body>
      <table width="80% " border="0" cellspacing="0" cellpadding="0" style="background:#d7cdf5; margin:0 auto;">
         <tr>
            <td style="padding:20px;">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td align="left"><a href="" target="_blank"><img src="" style="border:none;" width="156" height="75" alt="" /></a></td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                  </tr>
                  <tr>
                     <td align="left" style="background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;">
                        <h3>Hi Admin, </h3>
                        <p>You are receiving this E-mail from <strong><code></code></strong> (From: <b> </b> view) 
                          <br />
                          <br />
                          <br />
                        <table >
                          <tr>
                            <td><b>Finish:</b></td>
                            <td>{{ $details['finish']->name }}</td>
                            <td>{{ $details['finish']->price }}</td>
                            @php $filename = $details['finish']->filename; @endphp
                            <td colspan="2"><img src='{{ asset("images/finish/$filename") }}'></td>
                          </tr>
                          <tr>
                            <td><b>Edge:</b></td>
                            <td>{{ $details['edge']->name }}</td>
                            <td>{{ $details['edge']->price }}</td>
                            @php $filename = $details['edge']->filename; @endphp
                            <td colspan="2"><img src='{{ asset("images/edge/$filename") }}'></td>
                         </tr>
                         <tr>
                            <td><b>Design:</b></td>
                            <td>{{ $details['design']->name }}</td>
                            <td>
                              <ol class="lists">  
                                <p><b>Dimensions</b></p>
                                @php $name = $details['dimensions']; @endphp
                                @foreach($name as $key)
                                  <li>{{ $key->name }}</li>
                                 @endforeach
                              </ol>
                            </td>
                            <td>
                              <ol class="lists">  
                                <p><b>Size</b></p>
                                @php $size = $details['size']; @endphp
                                @foreach($size as $key => $size_val)
                                  <li>{{ $size_val }}</li>
                                 @endforeach
                              </ol>
                            </td>
                            @php $filename = $details['design']->filename; @endphp
                            <td><img src='{{ asset("images/design/$filename") }}'></td>
                         </tr>
                         <tr>
                           <td><b>Substrate:</b></td>
                           <td colspan="4">{{ $details['substrate'] }}</td>
                         </tr>
                         <tr>
                           <td><b>Thickness:</b></td>
                           <td colspan="4">{{ $details['thickness'] }}</td>
                         </tr>
                          @php if ($details['sink_bowl_swith_btn'] == 'on') { @endphp
                          <tr>
                            <td><b>Sink Bowl:</b></td>
                            <td colspan="4">{{ $details['sink_bowl_val'] }}</td>
                          </tr>
                          @php } @endphp

                          @php if ($details['hob_cut_swith_btn'] == 'on') { @endphp
                          <tr>
                            <td><b>Cooking Hob Cut Out:</b></td>
                            <td>
                              <b>Length: </b>
                              {{ $details['hob_length'] }} Inches
                            </td>
                            <td colspan="3">
                              <b>Width: </b>
                              {{ $details['hob_width'] }} Inches
                            </td>
                          </tr>
                          @php } @endphp

                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td height="10"></td>
                  </tr>
                  <tr>
                     <td height="10"></td>
                  </tr>
                  <tr>
                     <td style="background:#5738ad; padding:10px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:16px;">
                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                           <tr>
                              <td width="81%" align="left">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td colspan="2" align="left" valign="middle"><a href="" target="_blank" style="color:#fff"></a></td>
                                    </tr>
                                    <tr>
                                       <td colspan="2" align="left" valign="middle"><a href="mailto:" target="_blank" style="color:#fff"></a></td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="6%" align="right"><a href="" target="_blank"><img src="{{asset('images/agent_f.png')}}" style="border:none" width="26" height="27" alt="" /></a></td>
                              <td width="7%" align="right"><a href="" target="_blank"><img src="{{asset('images/in_f.png')}}" style="border:none" width="27" height="27" alt="" /></a></td>
                              <td width="6%" align="right"><a href="" target="_blank"><img src="{{asset('images/t_agent.png')}}" style="border:none" width="26" height="27" alt="" /></a></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                  </tr>
                  <tr>
                     <td align="center" style="font-family:Arial; font-size:12px; color:#000;">Copyright © 2020 livingstonrealtygoodliving<br />
                        <br />
                        <br />
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </body>
</html>