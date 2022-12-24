
# NEXIT

## Writing Multi-page as Function

### 2.0 version ( Release )

--- 
### What's new !
- ### ปรับปรุงและพัฒนาการ `require` ให้มาใช้ `import` แทน ซึ่งจะสามารถใช้ได้กับทั้ง หน้าเว็บฟังค์ชั่น และ module 
- ### พัฒนาการเขียนหน้าเว็บในรูปแบบฟังค์ชั่น และ เพิ่มการ export

---
Menu

[NEXIT คืออะไร](#nexit-คืออะไร)

[ติดตั้ง](#ติดตั้ง)

[การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น](#การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น)

[modules](#modules)

[โฟลเดอร์ pages](#โฟลเดอร์-pages)

[dynamic path](#dynamic-path)

[_](#_)

[_app.php](#_app.php)

[_error.php](#_error.php)

[โฟลเดอร์ public](#โฟลเดอร์-public)

[โฟลเดอร์ static](#โฟลเดอร์-static)

---
### NEXIT คืออะไร
- จากโปรเจค [PHP_SPA](https://github.com/Arikato111/PHP_SPA) ที่ได้มีการเขียนในรูปแบบฟังค์ชั่น ซึ่งต้องมาคอยกำหนด path ด้วยตัวเอง ซึ่งอาจจะทำให้ซับซ้อนขึ้นมาพอสมควรและต้องปรับรูปแบบการเขียนไปจากเดิมมาก ก็เลยได้มีการสร้างโปรเจคนี้ขึ้น ซึ่งจะทำให้สามารถเขียนแยกหน้าได้เหมือนเดิม และยังสามารถเขียนแบบฟังค์ชั่นได้อีกด้วย ถือเป็นการผสมผสานกันอย่างพอเหมาะพอดี 
  
- NEXIT คือการเขียนในรูปแบบแยกหน้าการทำงาน คล้ายกับการเขียนแบบปกติ เพียงแต่การเขียนหน้าต่างๆ จะเป็นในรูปแบบ function และสามารถทำงานร่วมกับ modules อื่นๆ ได้
---
### การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น
- การเขียนแต่ละหน้าจะเปลี่ยนไปเป็นการเขียนเป็นในรูปแบบ function แทนการเขียนแยกเป็นหน้าๆ ตามปกติ
- ตัวอย่างการเขียน และ อธิบายองค์ประกอบต่างๆ

```php
<?php
$title = import('wisit-router/title');

$Home = function () use ($title) {
  $title('Home');
  return <<<HTML
    <div>
      <div>Hello world</div>
    </div>
    HTML;
};

$export = $Home;
```
- `$title = import('wisit-router/title');`
  - ส่วนแรกคือการ `import` module  เข้ามาใช้งาน ซึ่งจะอธิบายโดยละเอียดในหัวข้อ `import`
- `$Home` และ `use` 
  - อย่างที่ได้กล่าวไปว่าเป็นการเขียนในรูปแบบฟังค์ชั่น และ `$Home` ก็เป็นฟังค์ชั่นๆ หนึ่งที่จะ return ค่าไปแสดงผลเป็น HTML โดยมีการใช้ `$export` เพื่อส่งค่าต่อไปเมื่อถูก import ซึ่งนอกจากฟังค์ชั่น $Home แล้วก็สามารถสร้างฟังค์ชั่นอื่นๆ มาทำงานร่วมกันได้แต่อย่างไรก็ตาม จะ ` $export` ได้เพียงฟังค์ชั่นเดียว 
  - เมื่อมีพังค์ชั่นอื่นหรือ modules อื่นที่ import เข้ามาแล้วต้องการให้มาทำงานภายในฟังค์ชั่นที่ต้องการ สามารถใช้ `use ()` ได้ และใส่ตัวแปรที่ต้องการให้ทำงานภายในฟังค์ชั่นลงไป
  - **ข้อควรระวังสำหรับการสร้างฟังค์ชั่น ไม่ควรประกาศฟังค์ชั่นที่เป็นสถานะ Global ( ฟังค์ชั่นตามแบบปกติ) แนะนำให้ประกาศลงในตัวแปรเท่านั้น เพื่อป้องกัน error ในกรณีมีการ import ซ้ำ
  - `$export` เพื่อจะทำงานร่วมกับไฟล์หรือฟังค์ชั่นอื่นๆ การ export มีไว้เพื่อส่งค่าๆ นั้นออกไป เมื่อถูก import  เช่นในตัวอย่างที่มีการ `$export = $Home;` คือการส่ง $Home ออกไป

---
### import
- เพื่อให้สามารถเขียนหน้าเว็บในรูปแบบฟังค์ชั่น ควรใช้ `import` แทนการ `require` ซึ่งจะมีตัวอย่างและวิธีใช้กับประเภทไฟล์ต่างๆ ดังนี้
#### การ import modules
- ตัวอย่าง การ import wisit-router
```php
['Route' => $Route] = import('wisit-router');
```
-  สำหรับ `modules` นั้นจะใส่เพียงชื่อของ modules ที่ต้องการเท่านั้น 
  
-  หาก modules ที่ต้องการนั้นรองรับการ import แบบ ไฟล์ย่อยๆ ก็สามารถ import ได้ เช่น
```php
$title = import('wisit-router/title');
```
- จะสังเกตุว่าไม่ต้องใส่นามสกุลของไฟล์ (.php)
#### การ import ไฟล์อื่นๆ รวมทั้งไฟล์เว็บแบบฟังค์ชึ่น
 - ตัวอย่าง
```php
$HomePage = import('./src/Home');
```
- จำเป็นต้องใส่ที่อยู่ไฟล์โดยอ้างอิงจาก path นอกสุดเสมอ และ จำเป็นต้องใส่ `./` หน้าสุดข้องที่อยู่ไฟล์ตามตัวอย่าง
- และ เหมือนกับ modules เมื่อกี้คือ **ไม่ต้องใส่นามสกุลของไฟล์**
---
### modules
- ในโปรเจคนี้จะมี `modules` เริ่มต้นมาให้ 3 modules คือ
  - use-import
  - nexit
  - wisit-router
- นอกจากนั้นคุณสามารถติดตั้ง `modules` อื่นๆ หรือเขียนขึ้นมาเองก็ได้ ซึ่งมีข้อกำหนดดังนี้
  -   0 ไฟล์หลักใน  `module`  จะต้องชื่อ  `main.m.php`  เท่านั้น
  -   1 ชื่อโฟลเดอร์ของ  `module`  คือชื่อของ  `module`
  -  2 หากจะทำให้มีการ  `import`  ซ้ำได้ และมีตัวแปรมารับค่า ต้องเขียนภายในขอบเขตการ  `return`   ซึ่งจะ  `return`  เป็น function , variable, array, obj ก็ได้ทั้งนั้น
- `use-import` คือ module ที่จะทำให้สามารถใช้ import แทน require ซึ่งในการเขียนนั้นจะไม่ใช้ require อีก
- `nexit` คือใจหลักของโปรเจคนี้ ที่จะทำให้สามารถทำงานได้อย่างที่เป็นอยู่ ซึ่งจะมีการใช้งานที่หน้า `index.php`
- `wisit-router` คือ module จาก [PHP_SPA](https://github.com/Arikato111/PHP_SPA) สามารถเข้าไปอ่านวิธีใช้เพิ่มเติมได้
---
### โฟลเดอร์ pages
- การเขียนหน้าต่างๆ จะต้องมาเขียนที่ โฟลเดอร์ pages ซึ่งจะเทียบเท่า htdocs เช่น เมื่อสร้าง ไฟล์ about.php ไว้ใน pages เมื่อเข้าหน้า about.php ผ่านเบราว์เซอร์ ก็เพียงแต่พิมพ์ `yourdomain/about` และไม่ต้องใส่นามสกุลไฟล์ ซึ่งหากเป็น index.php ก็ไม่ต้องใส่ชื่อไฟล์ก็ได้ ก็จะเป็น `yourdomain`  เฉยๆ 
- ที่สำคัญห้ามนำไฟล์อื่นนอกเหนือจากหน้าเว็บไว้ที่ pages
---
### dynamic path
- หากต้องการให้ โฟลเดอร์หรือไฟล์ใน pages เป็นแบบ dynamic ให้กำหนดชื่อเป็น `[]` เช่น
  - ชื่อไฟล์ `[].php`
  - ชื่อโฟลเดอร์ `[]`
---
### _
- หากไม่ต้องการให้หน้านั้นถูกเข้าถึงให้ใส่ `_` 
- และระวังเรื่อง dynamic path ที่อาจจะมี `_` ปนอยู่
---
### _app.php
- หากมีหน้าที่เป็น function และถูกเรียกใช้งาน ตัว `_app.php` จะทำการรับหน้านั้นเข้ามา แล้วค่อย return ออกไป ซึ่งสามารถเขียนส่วนอื่นๆ เพิ่มเติม เช่น navbar หรือ footer และส่วนอื่นๆ ซึ่งจะทำให้ หน้าเว็บที่เขียนแบบ function ไม่จำเป็นต้องเขียนหน้าทั้งหมด สามารถเขียนเพียงบางส่วนของเว็บไซต์ได้
- ห้ามเปลี่ยนชื่อไฟล์
---
### _error.php
- คือหน้าที่จะแสดงผลเมื่อผู้ใช้ไม่พบหน้าที่ต้องการ ซึ่งห้ามเปลี่ยนชื่อไฟล์
---
### โฟลเดอร์ public
- ตามชื่อไฟล์เลย หากคุณต้องการเก็บอะไรที่ต้องการให้คนอื่นเข้าถึง เช่นรูบภาพ ไฟล์ ก็สามารถนำมาไว้ที่นี่ได้
- --
### โฟลเดอร์ static
- นี่เป็นโฟล์เดอร์สำหรับเก็บไฟล์ css , js
- และตอนใช้งานอย่าลืม link ละ
---

### ติดตั้ง

- ใช้ [control](https://github.com/Arikato111/control) ในการติดตั้ง
	ใช้คำสั่ง 
	```
	php control create nexit-app
	```
  

- คัดลอกโค้ดไปวางไว้หน้า `index.php` แล้วรันหน้านั้น
```
<?php
eval(file_get_contents('https://raw.githubusercontent.com/Arikato111/NEXIT/installer/Release2-0.txt'));
```
