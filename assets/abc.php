<table class="table table-dark table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Deparment</td>
				<td>Student rollno </td>
				<td>Student Name</td>
				<td>Change password</td>
			</tr>
		</thead>
		<tbody>
			
			<tr>

				
				    <?php $count =0; ?>	
				<?php foreach( $students->result() as $student ): ?>
				<td><?= ++$count ?></td>
				<td><?= $student->department; ?></td>
				<td><?= $student->rollno; ?></td>
				<td><?= $student->name; ?></td>
				<td><?php 

				echo form_open('Admin/load_update_student_password');

				echo form_hidden(['rollno'=>$student->rollno,'department'=>$student->department,'id'=>$student->id,'name'=>$student->name]);
				echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-outline-success']); echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
    </div>




    <!-- ------------------------------------------------------------------------------------------ -->


    <table class="table table-dark table-hover">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Deparment</td>
				<td>Teacher name </td>
				<td>Teacher Username</td>
				<td>department id </td>
				<td>staff id</td>
				<td>Change password</td>
			</tr>
		</thead>
		<tbody>
			
			<tr>

				
				    <?php $count =0; ?>	
				<?php foreach( $teachers->result() as $teacher ): ?>
				<td><?= ++$count ?></td>
				<td><?= $teacher->department; ?></td>
				<td><?= $teacher->name; ?></td>
				<td><?= $teacher->username; ?></td>
				<td><?= $teacher->department_id; ?></td>
				<td><?= $teacher->staff_id; ?></td>
				<td><?php 

				echo form_open('Admin/load_update_teacher_password');

				echo form_hidden(['username'=>$teacher->username,'department'=>$teacher->department,'id'=>$teacher->id]);
				echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-outline-success']); echo form_close();
	?> </td>
			
			</tr>

			<?php endforeach; ?></tbody></table>
    </div>