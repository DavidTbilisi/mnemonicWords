<form action="<?php echo site_url().'/save'?>" method="post">
<div class="flex">
    <input placeholder="ახალი სიტყვა" name="newWord" type="text">
    <input placeholder="ასოციაცია" name="assoc" type="text">
    <input placeholder="კავშირი" name="connection" type="text">
    <input placeholder="მნიშვნელობა" name="meaning" type="text">
    <input type="submit" name="save" value="დამახსოვრება">
</div>
</form>


<table>
    <thead>
    <tr>
        <td>#</td>
        <td>ID</td>
        <td>ახალი სიტყვა</td>
        <td>ასოციაცია</td>
        <td>კავშირი</td>
        <td>მნიშვნელობა</td>
        <td>რედაქტირება</td>
        <td>წაშლა</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($a as $index => $row) :?>
            <tr data-id="<?php echo $row->id ?>">
                <td><?php echo ++$index?></td>
                <td class="id editable"><?php echo $row->id ?></td>
                <td class="newWord editable "><?php echo $row->newWord ?></td>
                <td class="assoc editable "><?php echo $row->assoc ?></td>
                <td class="connection editable "><?php echo $row->connection ?></td>
                <td class="meaning editable "><?php echo $row->meaning ?></td>
               <td><a class="edit" href="<?php echo site_url().'/edit/'.$row->id?>">რედაქტირება</a></td>
               <td><a class="delete" href="<?php echo site_url().'/delete/'.$row->id?>">წაშლა</a></td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="text-block">
    <h1 class="title">უცხო სიტყვების სწავლის ასოციაციიური მეთოდი</h1>
    <p><b>სიტყვების ასოციაციური დამახსოვრებით მეთოდი შედგება 4 შემადგენლისგან</b></p>
    <ul>
        <li>ახალი სიტყვისგან</li>
        <li>ახალ სიტყვასთან დაკავშირებული საგანი/სიტყვა რომელიც პირველი ამოტივტივდება თავში ახალი სიტყვის გაგნებისთანავე</li>
        <li>თავად სიტყვის მნიშვნელობა მშობლიურ ენაზე </li>
        <li> ახალი სიტყვის ასოციაციის დაკავშირება მშობლიური სიტყვის მნიშვნელობასთან </li>
    </ul>
</div>