<h2>提交界面如下：</h2>

<?php echo validation_errors(); ?>  <!-- 用来报告表单验证中出现的错误信息 -->

<?php echo form_open('news/create') ?>  <!--  表单辅助函数 提供，用来提供表单元素和一些额外功能，例如添加隐藏的 安全类 -->

  <label for="title">Title</label> 
  <input type="input" name="title" /><br />

  <label for="text">Text</label>
  <textarea name="text"></textarea><br />
  
  <input type="submit" name="submit" value="确定提交" /> 

</form>