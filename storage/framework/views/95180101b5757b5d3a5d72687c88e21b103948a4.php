<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 shadow">
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-transparent  px-4 overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="flex ">
                    <div class="flex-auto text-2xl mb-4">Задач лист</div>


                    <form action="<?php echo e(route('search')); ?>" method="GET">
  <input type="text" name="search" class="form-control" style="background-color:transparent; height:50px;"/>
  <button type="submit" class="btn btn-dark" style="background-color:transparent;height:50px;" >Поиск</button>
</form>


                    <!-- <div class="form-search">
                        <form action="<?php echo e(url('/search')); ?>" type="get">
                    <div class="form-group">
                        <input name="search" type="query" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary"></button>
                    </div>
</form> -->
                    
                    <div class="flex-auto text-right mt-2">
                        <a href="/task" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded" style="float: right;">Новая задача</a>
                    </div>
                </div>




                <table class="w-full text-md rounded mb-4 ">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Задача</th>
                        <th class="text-left p-3 px-5">Пользователь</th>
                        <th class="text-left p-3 px-5">Категория</th>
                        <th class="text-left p-3 px-5">Действие</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="tasks-block flex col">
                    <?php $__currentLoopData = auth()->user()->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr class="task-item border-b hover:bg-orange-100">

                            <td class="p-3 px-5" style="font-size:30px; word-break: break-all;">

                                <?php echo e($task->description); ?>

                                
                                
                            </td>
                            <td class="p-3 px-5">
                                
                                user id
                                <?php echo e($task->user_id); ?>




                                
                            </td>
                            <td class="p-3 px-5">
                                cat id

                                <?php echo e($task->category_id); ?>


                                
                            </td>
                                
                                
                            <td class="p-3 px-5">
                                
                                <a href="/task/<?php echo e($task->id); ?>" name="edit" class="mr-3 bg-blue-500 hover:bg-blue-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Изменить</a>
                                <form action="/task/<?php echo e($task->id); ?>" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Удалить</button>
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </td>
                        </tr>
                        

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<style>



    .meblock{
        background: #FFFFFF;
mix-blend-mode: multiply;
box-shadow: 0px 32px 100px rgba(0, 0, 0, 0.18);
border-radius: 12px;
    }

    .tasks-block{
        mix-blend-mode: normal;
filter: drop-shadow(0px 18px 80px rgba(0, 0, 0, 0.18));
border-radius: 4px;                                                                                                                                           


    }
    .task-item{
        background: transparent;
backdrop-filter: blur(37.5px);
        margin-top:100px;
    }
</style>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OpenServer\domains\DenDoit\resources\views/home.blade.php ENDPATH**/ ?>