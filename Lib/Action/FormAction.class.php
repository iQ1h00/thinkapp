<?php
class FormAction extends Action{ 
	public function add(){
		$Form = D('Form');
		$data['title'] = '内部额外添加1'; 
		$data['content'] = '内部额外添加1内容'; 
		$data['create_time'] = time();
		$data['num'] = rand();
		$Form->add($data);
	
		$Form = D('Form'); 
		$Form->title = '内部额外添加2'; 
		$Form->content = '内部额外添加2内容'; 
		$Form->create_time = time();
		$Form->num = rand();
		$Form->add();

		$this->display();
		
	}
	
	public function insert(){  
		$Form = D('Form');         
		if($Form->create()) {            
			$result = $Form->add();             
			if($result) {                 
				$this->success('操作成功！');             
			}else{                 
				$this->error('写入错误！');            
			}         
		}else{            
			$this->error($Form->getError());         
		}    
	} 

	public function read($id=0){
		$Form   =   M('Form');     // 读取数据     
		$data =   $Form->find($id);     
		if($data) {         
			$this->data =   $data;// 模板变量赋值     
		}else{         
			$this->error('数据错误');     
		}     
		$this->display(); 
	}

	public function edit($id=0){ 
		$Form = M("Form");  // 要修改的数据对象属性赋值 
		$data['id'] = $id; 
		$data['create_time'] = time();
		$Form->save($data); // 根据条件保存修改的数据

		$Form = M("Form");  // 要修改的数据对象属性赋值 
		$data['create_time'] = time();
		$Form->where("id=$id")->save($data); // 根据条件保存修改的数据

		$Form = M("Form");  // 要修改的数据对象属性赋值 
		$Form->create_time = time();
		$Form->where("id=$id")->save(); // 根据条件保存修改的数据

		$Form = M("Form");  // 更改create_time值 
		$Form->where("id=$id")->setField('create_time',time());

		$Form = M("Form");  // 增加create_time值 
		$Form->where("id=$id")->setInc('create_time',time());

		$Form   =   M('Form');     
		$this->vo   =   $Form->find($id);     
		$this->display(); 
	} 
	
	public function update(){     
		$Form   =   D('Form');     
		if($Form->create()) {         
			$result =   $Form->save();         
			if($result) {             
				$this->success('操作成功！');         
			}else{             
				$this->error('写入错误！');         
			}     
		}else{         
			$this->error($Form->getError());     
		} 
	}


	public function del($id=0){
		$Form = M('Form'); 
		$Form->delete($id);
		$Form->where("create_time=1413517454")->delete();
		echo "id=$id del sucess.<br/>";
	}

	public function testfind(){
		/*
		$Form = M("Form"); // 实例化Form对象 
		$this->data = $Form->where('num<20000 AND id<10')->select(); 
		
		$Form = M("Form"); // 实例化Form对象 
		$condition['id'] = 5;
		$this->data = $Form->where($condition)->select();
		
		$Form = M("Form"); // 实例化Form对象 
		$condition['id'] = 5;
		$condition['num'] = 1621;
		$condition['_logic'] = 'OR';
		$this->data = $Form->where($condition)->select();
		
		$Form = M("Form"); // 实例化Form对象
		$condition = new stdClass();
		$condition->id = 5;
		$condition->num = 10514;
		$condition->_logic = 'OR';
		$this->data = $Form->where($condition)->select();
		
		$Form = M("Form");// 实例化Form对象
		$map['id'] = array('elt', 6); //eq=; neq!=; gt>; egt>=; lt<; elt;
		$this->data = $Form->where($map)->select();
		
		$Form = M("Form");// 实例化Form对象
		$map['title'] = array('like', "内部%2"); //like; notlike
		$this->data = $Form->where($map)->select();
		
		$Form = M("Form");// 实例化Form对象
		$map['content'] = array('like', array("内部%2%", "%4%"), 'AND'); //content like "内部%2%" AND content like "%4%"
		$map['num'] = array('gt', 20000);
		$map["_logic"] = "OR";
		$this->data = $Form->where($map)->select(); //(content like "内部%2%" AND content like "%4%") OR (num > 20000)
		
		$Form = M("Form");// 实例化Form对象
		$map['num'] = array('not between', "10000, 20000"); //between;not between
		$this->data = $Form->where($map)->select();
		
		$Form = M("Form");// 实例化Form对象
		$map['id'] = array('not in', "1,6,11"); //in; not in
		$this->data = $Form->where($map)->select();
		
		$Form = M("Form");// 实例化Form对象
		$map['id'] = array('exp', "in(1,6,11)"); //in; not in
		$this->data = $Form->where($map)->select();
		*/
		$Form = M("Form");// 实例化Form对象
		$map['num'] = array('exp', "num+5"); //in; not in
		$Form->where('id=5')->save($map);

		$this->display();
	}
}