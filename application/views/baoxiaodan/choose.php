<div class="w" id="regist">	
<a href="<?=site_url("baoxiaodan/get_huilv")?>" style="display:none" id="huilv" ></a>
<a href="<?=site_url("baoxiaodan/get_butie")?>" style="display:none" id="butie" ></a>

<?php 
	$attributes = array('id' => 'baoxiaoform');
    echo form_open('baoxiaodan/check_data', $attributes);
	?>	
	<table id="baoxiao"  align="center" > 
	<thead> 
  	<tr> 
	  <th scope="col" colspan='2' class="rounded-company"></th>	
	  <th scope="col" class="rounded-q2" colspan='2' ><span id='someheader'>�ύ������</span></th>	
	  <th scope="col" class="rounded-q4" colspan='2' ></th>
	 	</tr> 
   </thead> 
	<tfoot> 
		<tr> 
		<td colspan="5" class="rounded-foot-left"></td> 
		<td class="rounded-foot-right">&nbsp;</td> 
		</tr> 
	</tfoot> 
	<tbody> 
	<tr>  
			<td  align="right"><strong>Ա�����:</strong></td> 
			<td  align="left"><?php echo $yuangongbianhao?></td> 
			<td  align="right"><strong>Ա������:</strong></td> 
			<td  align="left"><?php echo $xingming?></td> 
			<td  align="right"><strong>��������:</strong></td> 
		    <td  align="left"><?php echo $bumenming; ?></td> 
		</tr> 
		<tr> 
			<td  align="right"><strong>���������:</strong></td> 
			<td  align="left">ϵͳ�Զ�����</td> 
			<td  align="right"><strong>���ʽ:</strong></td> 
			<td  align="left">
			      <select id="customer_type" name="customer_type" size="1" > 
					<option value="�ֽ�" selected="selected" >�ֽ�</option>	
					<option value="֧Ʊ" >֧Ʊ</option>
					<option value="���" >���</option>		
					<option value="���ÿ�" >���ÿ�</option>
					<option value="������" >������</option>							
				</select></td> 
			<td  align="right"><strong>������������:</strong></td> 
		    <td  align="left">		      
		    <select id="bumen" name="bumen" size="1"> 
					<option value='<?php  echo "$bumenbianhao";?>' selected="selected"><?php echo "$bumenming";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>		
		           <?php foreach($bumen as $bumeninfo):?>
					<option value="<?php echo $bumeninfo['bumenbianhao']?>"><?php echo $bumeninfo['bumenming']?></option>
					<?php endforeach;?>
				</select></td> 
		 </tr> 
			<tr> 
			<td  align="right"><strong>Ԥ���Ŀ���:</strong></td> 
		    <td  align="left">			      
		    <select id="yusuan" name="yusuan" size="1"> 
					<option value="0" selected="selected">&nbsp;&nbsp;&nbsp;��Ԥ���Ŀ(0)&nbsp;&nbsp;&nbsp;</option> 						
				</select>
			</td>
			<td  align="right"><strong>�������:</strong></td> 
		    <td  align="left">			      
		    <select id="leibie" name="leibie" size="1" onchange="change_type(this)"> 
					<option value="0" selected="selected">---��ѡ��---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option> 
					<option value="1" >��ͨ��</option>	
					<option value="2" >���÷�</option>
					<option value="3" >���ʷ�</option>		
					<option value="4" >��Ʒ��</option>
					<option value="5" >�̶��ʲ��ɹ�����</option>	
					<option value="6" >ͨ�ñ�����</option>							
				</select></td>

			<td  align="right"><strong>�ܽ��:</strong></td> 
		    <td  align="left"><input type="text" id="zongjine" name="zongjine" readonly="readonly"></input></td> 

		</tr>  		
	</tbody> 
		</table> 	
<div style="clear:both;height:30px;"></div>
<?php 
	 $this->load->view('baoxiaodan/jiaotong',$basic);
	 $this->load->view('baoxiaodan/chailv',$basic);
	 $this->load->view('baoxiaodan/jiaoji',$basic);
	 $this->load->view('baoxiaodan/lipin',$basic);
	 $this->load->view('baoxiaodan/zichan',$basic);
	 $this->load->view('baoxiaodan/tongyong',$basic); 
 ?>

 <div class="tab"></div>	
<div id="list">
<span id='headline'>�Ѿ���ӵı������б�</span>
<div id="table1" style="display:none;">
 <table id="list" summary="��ͨ��" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">���</th>
					<th scope="col" class="rounded-q1">��������</th>
					<th scope="col" class="rounded-q3">�վݽ��</th> 
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 
					<th scope="col" class="rounded-q1">�ϳ�ʱ��</th> 
					<th scope="col" class="rounded-q2">�ϳ��ص�</th> 
					<th scope="col" class="rounded-q3">�³�ʱ��</th> 
					<th scope="col" class="rounded-q1">�³��ص�</th> 
					<th scope="col" class="rounded-q1">�ͻ����</th> 					
					<th scope="col" class="rounded-q3">������Ŀ</th> 
					<th scope="col" class="rounded-q4">����</th>
					</tr> 
					</thead> 
		     <tfoot>
					<tr> 
				 <td colspan="12" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="traffic2"> 

	</tbody> 
</table> 	
</div>	
<div style="clear:both;height:10px;"></div>	
<div id="table2" style="display:none;">
 <table id="jiaotong" summary="���÷�" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">���</th>
					<th scope="col" class="rounded-q3">��������</th>
					<th scope="col" class="rounded-q3">�վݽ��</th> 
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th>  					
					<th scope="col" class="rounded-q1">����Ŀ�ĵ�</th> 
					<th scope="col" class="rounded-q2">��ʼʱ��</th> 
					<th scope="col" class="rounded-q3">����ʱ��</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q1">�ͻ����</th> 					
					<th scope="col" class="rounded-q3">������Ŀ</th> 
					<th scope="col" class="rounded-q4">����</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="12" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="chai_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>	
	
<div id="table3" style="display:none;">
 <table id="jiaotong" summary="���ʷ�" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">���</th>
					<th scope="col" class="rounded-q3">�վݽ��</th> 	
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 					
					<th scope="col" class="rounded-q1">����ʱ��</th> 
					<th scope="col" class="rounded-q1">���ʵص�</th> 
					<th scope="col" class="rounded-q2">���빫˾����</th> 
					<th scope="col" class="rounded-q3">����������</th> 
					<th scope="col" class="rounded-q1">�ͻ�</th> 					
					<th scope="col" class="rounded-q1">������Ŀ</th> 
					<th scope="col" class="rounded-q4">����</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="11" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="jiaoji_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>	
	
	<div id="table4" style="display:none;">
 <table id="jiaotong" summary="��Ʒ��" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">���</th>
					<th scope="col" class="rounded-q3">�վݽ��</th> 	
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 					
					<th scope="col" class="rounded-q1">����Ʒʱ��</th> 
					<th scope="col" class="rounded-q1">��Ʒ��</th> 
					<th scope="col" class="rounded-q2">������Ʒ��˾����</th> 
					<th scope="col" class="rounded-q3">������Ʒ����</th> 
					<th scope="col" class="rounded-q1">�ͻ�</th> 					
					<th scope="col" class="rounded-q1">������Ŀ</th> 
					<th scope="col" class="rounded-q4">����</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="11" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="lipin_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>
<div id="table5" style="display:none;">
 <table id="jiaotong" summary="�̶��ʲ��۾ɷѷ�" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">���</th>
					<th scope="col" class="rounded-q3">�վݽ��</th> 	
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 					
					<th scope="col" class="rounded-q1">�ɹ�ʱ��</th> 
					<th scope="col" class="rounded-q1">�ʲ���</th> 
					<th scope="col" class="rounded-q2">��;</th> 					
					<th scope="col" class="rounded-q2">������Ŀ</th> 
					<th scope="col" class="rounded-q4">����</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="9" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="zichan_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>
<div id="table6" style="display:none;">
 <table id="jiaotong" summary="ͨ�ñ�����" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">���</th>
					<th scope="col" class="rounded-q3">�վݽ��</th> 	
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 					
					<th scope="col" class="rounded-q1">֧��ʱ��</th> 
					<th scope="col" class="rounded-q1">ʹ��Ŀ��</th> 
					<th scope="col" class="rounded-q2">������ϸ</th> 
					<th scope="col" class="rounded-q1">��Ӧ�ͻ�</th> 					
					<th scope="col" class="rounded-q1">������Ŀ</th> 
					<th scope="col" class="rounded-q4">����</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="10" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="tongyong_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>
	<span id="beizhu" > <label >��ע��</label>
     <textarea  name="remark" id="remark" style="color:#028ad4"></textarea>
     </span>
     <div style="clear:both;height:15px;"></div>
     <span>
     <input type="submit"  value="�ύ������"  class="btn-img btn-regist" onclick="return present();"></input>
<!--     <input type="button"  value="ȫ�����" class="btn-img btn-regist" onclick="emptyall()"></input>-->
     </span>
</div>
	
</form>	
</div>

