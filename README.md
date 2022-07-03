
# NEXIT

## Writing as Multi or Single

### 1.0 version
---
Menu
[NEXIT คืออะไร]()
[ติดตั้ง]()
[function และ multi-page]()
[modules]()
[โฟลเดอร์ pages]()
[โฟลเดอร์ public]()
[โฟลเดอร์ static]()

---
### NEXIT คืออะไร
- จากโปรเจค [PHP_SPA](https://github.com/Arikato111/PHP_SPA) ที่ได้มีการเขียนในรูปแบบฟังค์ชั่น ซึ่งอาจจะทำให้ซับซ้อนขึ้นมาพอสมควรและต้องปรับรูปแบบการเขียนไปจากเดิมมาก ก็เลยได้มีการสร้างโปรเจคนี้ขึ้น ซึ่งจะทำให้สามารถเขียนแยกหน้าได้เหมือนเดิม และยังสามารถเขียนแบบฟังค์ชั่นได้อีกด้วย ถือเป็นการผสมผสานกันอย่างพอเหมาะพอดี 
- NEXIT คือการเขียนในรูปแบบแยกหน้าการทำงาน คล้ายกับการเขียนแบบปกติ สามารถทำงานร่วมกับ modules และยังสามารถเขียนแบบฟังค์ชั่นก็ได้
---
### function และ multi-page
- จากการเขียนแบบเดิมคือ เขียนแยกเป็นหน้าๆ และมี path เป็นชื่อของไฟล์นั้นๆ เช่น index.php , about.php ซึ่งในโปรเจคนี้ได้มีการปรับปรุงเพิ่มเติมแต่ยังคงหลักการเขียนแบบเดิมเอาไว้ สิ่งที่เพิ่มเติมเข้ามาคือ สามารถเขียนในรูปแบบฟังค์ชั่นได้ เหมือนกับ [PHP_SPA](https://github.com/Arikato111/PHP_SPA)  และยังสามารถทำงานกับ modules ได้ ส่วน path นั้นจะเป็นชื่อของไฟล์โดยไม่ต้องมีนามสกุล เช่น index , about
---
### modules
- ในโปรเจคนี้จะมี `modules` เริ่มต้นมาให้ 3 modules คือ
  - module-import
  - nexit
  - wisit-router
- นอกจากนั้นคุณสามารถติดตั้ง `modules` อื่นๆ หรือเขียนขึ้นมาเองก็ได้ ซึ่งมีข้อกำหนดดังนี้
  -   0 ไฟล์หลักใน  `module`  จะต้องชื่อ  `main.m.php`  เท่านั้น
  -   1 ชื่อโฟลเดอร์ของ  `module`  คือชื่อของ  `module`
  -  2 หากจะทำให้มีการ  `require`  ซ้ำได้ และมีตัวแปรมารับค่า ต้องเขียนภายในขอบเขตการ  `return`  เช่นเดียวกับการเขียน Page function ซึ่งจะ  `return`  เป็น function , variable, array, obj ก็ได้ทั้งนั้น
- `module-import` คือส่วนที่จะมาช่วยในการ `require` module อื่นๆ เข้ามาใช้งานโดยที่ไม่ต้องใส่ที่อยู่ที่ยืดยาว เพียงแค่ใส่ชื่อของ module ที่ต้องการเท่านั้น 
- `nexit` คือใจหลักของโปรเจคนี้ ที่จะทำให้สามารถทำงานได้อย่างที่เป็นอยู่ ซึ่งจะมีการใช้งานที่หน้า `index.php`
- `wisit-router` คือ module จาก [PHP_SPA](https://github.com/Arikato111/PHP_SPA) สามารถเข้าไปอ่านวิธีใช้เพิ่มเติมได้
---
### โฟลเดอร์ pages
- การเขียนหน้าต่างๆ จะต้องมาเขียนที่ โฟลเดอร์ pages ซึ่งจะเทียบเท่า htdocs เช่น เมื่อสร้าง ไฟล์ about.php ไว้ใน pages เมื่อเข้าหน้า about.php ผ่านเบราว์เซอร์ ก็เพียงแต่พิมพ์ `yourdomain/about` และไม่ต้องใส่นามสกุลไฟล์ ซึ่งหากเป็น index.php ก็ไม่ต้องใส่ชื่อไฟล์ก็ได้ ก็จะเป็น `yourdomain`  เฉยๆ 
- ที่สำคัญห้ามนำไฟล์อื่นนอกเหนือจากหน้าเว็บไว้ที่ pages
---
### โฟลเดอร์ public
- ตามชื่อไฟล์เลย หากคุณต้องการเก็บอะไรที่ต้องการให้คนอื่นเข้าถึง เช่นรูบภาพ ไฟล์ ก็สามารถนำมาไว้ที่นี่ได้
- --
### โฟลเดอร์ static
- นี่เป็นโฟล์เดอร์สำหรับเก็บไฟล์ css , js
- และตอนใช้งานอย่าลืม link ละ
---

### ติดตั้ง

  

- คัดลอกโค้ดไปวางไว้หน้า `index.php` แล้วรันหน้านั้น
```
<?php
eval(file_get_contents('https://raw.githubusercontent.com/Arikato111/NEXIT/installer/Release1-0.txt'));
```