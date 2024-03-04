function calculate() {
    // ดึงค่าจาก input ที่มี id เป็น "number"
    var inputNumber = document.getElementById('number').value;

    // ตรวจสอบว่า input ไม่ว่าง
    if (inputNumber !== "") {
        // คูณกับ 30
        var result = inputNumber * 30;

        // แสดงผลลัพธ์ใน input ที่มี id เป็น "result"
        document.getElementById('result').value = result;
    } else {
        // ถ้า input ว่างให้เซ็ตค่าใน input ที่มี id เป็น "result" เป็นว่าง
        document.getElementById('result').value = "";
    }
}