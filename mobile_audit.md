# 📱 WHDoctors Mobile Audit Report
**তারিখ:** ২রা এপ্রিল, ২০২৬  
**লক্ষ্য:** সাইটের ফোন ভিউ (Mobile Phone View) সম্পূর্ণ ঠিক করা  
**ব্রেকপয়েন্ট টার্গেট:** 375px (iPhone), 390px (iPhone 14), 412px (Android), 768px (Tablet)

---

## 🔴 CRITICAL ISSUES (এখনই ঠিক করতে হবে)

### 1. নেভিগেশন মেনু সম্পূর্ণ অনুপস্থিত মোবাইলে
- **ফাইল:** `resources/views/frontend/includes/header.blade.php`
- **সমস্যা:** Desktop-এ bottom navigation bar দেখা যায়। কিন্তু mobile-এ hamburger menu আছে, কিন্তু তার CSS শুধুমাত্র `max-width: 480px` এ কাজ করে।
- **বাস্তব সমস্যা:** Hamburger button (`.navbar-burger`) শুধু 480px এর নিচে দেখায়। অথচ 768px পর্যন্ত সব ফোন screen-এ main navigation হাওয়া!
- **Inspector Evidence:** `display: none !important` সব screen-এ `.mobile-menu` এ আছে; toggle `.active` class দিয়ে কাজ হচ্ছে কিন্তু trigger টা ভুল breakpoint-এ।
- **Fix:** Hamburger button দেখানো উচিত `max-width: 991px` এ, Desktop navbar hide করতে হবে `max-width: 991px` এ।

### 2. Swiper/Slider Arrow Button অস্বাভাবিক বড়
- **ফাইল:** `public/css/index.css` (line 263-270)
- **সমস্যা:** `.swiper-button-next, .swiper-button-prev` এর `width: 150px; height: 150px;` — এটা mobile-এ hero image-এর অর্ধেক জায়গা দখল করে।
- **স্ক্রিনশটে দেখা গেছে:** বাম ও ডানে বিশাল arrow overlaps করছে hero text ও image।
- **Fix:** Mobile-এ size `40px x 40px` এ নামিয়ে আনতে হবে।

### 3. Hero Slider Text মোবাইলে পড়ার অযোগ্য
- **ফাইল:** `resources/views/frontend/index.blade.php` এর Swiper section
- **সমস্যা:** Title text যেমন "University Kebangsaan Malaysia (UKM) Number # 2 In Malaysia" — mobile-এ font size desktop-এর মতো বড়, ছবির উপর overlap করে পুরো দৃশ্য ঢেকে ফেলছে।
- **স্ক্রিনশটে দেখা গেছে:** University logo ও building photo hero-র বেশিরভাগ অংশ দেখা যাচ্ছে না, text ও arrow দিয়ে ঢাকা।
- **Fix:** Mobile-এ font-size ও slider height reduce করতে হবে।

### 4. `body { padding: 10px }` সব section ভাঙছে
- **ফাইল:** `resources/views/frontend/app.blade.php` (line 86, 188)
- **সমস্যা:** Mobile breakpoint-এ `body { padding: 10px }` দেওয়া আছে। এটা পুরো site-এর সব full-width section ভেঙে দিচ্ছে — header, hero, footer সব কিছু দুই পাশে 10px সাদা gap দিচ্ছে।
- **Fix:** `body { padding: 0 }` করতে হবে mobile-এ। Section-এর ভেতরে নিজস্ব padding রাখতে হবে।

---

## 🟠 HIGH PRIORITY ISSUES (গুরুত্বপূর্ণ UX সমস্যা)

### 5. Top Header (Contact Bar) অগোছালো লেআউট
- **ফাইল:** `resources/views/frontend/includes/top-header.blade.php`
- **সমস্যা:** 
  - Address text অনেক লম্বা, mobile-এ awkward ভাবে wrap হচ্ছে (দেখা গেছে স্ক্রিনশটে)
  - Address + Phone + Email তিনটি আলাদা row-এ show করছে অনেক বেশি vertical space নিচ্ছে
  - Social icons (Facebook, WeChat, WhatsApp) ও Language switcher এক row-এ অগোছালো
- **বর্তমান অবস্থা (স্ক্রিনশট):** Top header প্রায় 230px উচ্চতা নিচ্ছে মোবাইলে — hero section-এর প্রায় 25% জায়গা নষ্ট।
- **Fix:** Mobile-এ address hide করা, শুধু phone ও email ক্লিকযোগ্য আইকন রাখা।

### 6. Mobile Menu Submenu কাজ করছে না
- **ফাইল:** `resources/views/frontend/includes/header.blade.php` (line 121-143)
- **সমস্যা:** Mobile nav-এ submenu `.mobile-nav-list li:hover > ul { display: block }` — hover কাজ করে desktop-এ কিন্তু মোবাইলে hover নেই, touch দিয়ে submenu খুলবে না।
- **Fix:** JavaScript দিয়ে click/tap event যোগ করতে হবে submenu toggle এর জন্য।

### 7. Google Translate Widget মোবাইলে UI ভাঙছে
- **ফাইল:** `resources/views/frontend/includes/top-header.blade.php` (line 321-332)
- **সমস্যা:** Google Translate widget mobile-এ একটি বড় UI element নিয়ে আসে যেটা layout ভাঙছে। "ভাষা বেছে নিন" text overflow হচ্ছে।
- **Fix:** Mobile-এ widget-কে iconic করা বা hide করা।

### 8. University Card Fixed Width মোবাইলে Overflow
- **ফাইল:** `public/css/index.css` (line 631-734)
- **সমস্যা:** `.university-root-class-name1` থেকে `.university-root-class-name35` পর্যন্ত সব class-এ `width: 280px` বা `width: 335px` বা `width: 400px` hardcode করা আছে।
- **ইমপ্যাক্ট:** 375px মোবাইলে 400px card overflow করে horizontal scroll তৈরি করছে।
- **Fix:** মোবাইল breakpoint-এ `width: 100%` বা `max-width: 100%` করতে হবে।

---

## 🟡 MEDIUM PRIORITY ISSUES (Design ও UX উন্নতি)

### 9. Footer Links মোবাইলে ট্যাপ করা কঠিন
- **ফাইল:** `resources/views/frontend/includes/footer.blade.php`
- **সমস্যা:** Footer links অনেক কাছাকাছি, touch target size 44px-এর কম।
- **Fix:** Link-এ `padding: 8px 0` যোগ করতে হবে।

### 10. Appointment Button মোবাইলে নেই
- **ফাইল:** `resources/views/frontend/includes/header.blade.php` (line 246-248)
- **সমস্যা:** Desktop-এ Appointment button দেখা যায় কিন্তু mobile menu-তে Appointment link নেই।
- **Fix:** Mobile menu list-এ Appointment link যোগ করতে হবে।

### 11. Hero উপরের Logo/Badge অদ্ভুত Position
- **স্ক্রিনশট:** Mobile hero-তে bottom-left corner-এ একটি hexagonal badge/logo দেখা যাচ্ছে যেটা hero image-এর উপর ভাসছে এবং text পড়ার পথে বাধা হচ্ছে।
- **Fix:** Mobile-এ badge-এর position ও size adjust করা।

### 12. `app.blade.php`-তে JS Error - emailModal
- **ফাইল:** `resources/views/frontend/app.blade.php` (line 276-281)
- **সমস্যা:** 
  ```javascript
  var myModal = new bootstrap.Modal(document.getElementById('emailModal'));
  myModal.show();
  ```
  `emailModal` element নেই বর্তমান HTML-এ (comment করা আছে, line 228-230)।  
  এই কারণে **প্রতিটি পেজ লোডে JavaScript error হচ্ছে** যা সব JS execution বাধাগ্রস্ত করছে।
- **Fix:** এই script block হয় সরাতে হবে অথবা `null` check যোগ করতে হবে।

### 13. CSS Media Query বিভ্রান্তিকর Duplication
- **ফাইল:** `resources/views/frontend/app.blade.php`  
- **সমস্যা:** Same `@media (max-width: 767px)` rule দুইবার আছে (line 80-114 এবং 178-192) — একই body padding rule দুই জায়গায়।
- **Fix:** Consolidate করতে হবে।

---

## 🟢 LOW PRIORITY / POLISH ITEMS

### 14. Font Family Inconsistency
- Inline `style="font-family:Times New Roman;"` শতাধিক জায়গায় — mobile-এ এটা serif font দেখায় যা modern নয়।
- CSS variable দিয়ে একটি জায়গা থেকে control হওয়া উচিত।

### 15. Slider Height মোবাইলে অতিরিক্ত বড়
- Mobile-এ slider/hero অনেক বেশি screen নিচ্ছে। ৩৭৫px স্ক্রিনে hero section অনেক বেশি বড়।
- `max-height: 50vh` mobile-এ।

### 16. Scroll to Top Button Position and Size
- মোবাইলে `.slide-to-top-slide-to-top` button ঠিক position-এ নেই এবং content-এর উপর overlap হতে পারে।

---

## 📋 FIX PRIORITY চেকলিস্ট (কাজের ক্রম)

```
প্রথম পর্যায় - Critical (সাইট ব্যবহারযোগ্য করা):
[x] P1: body padding ঠিক করা (app.blade.php)
[x] P2: JavaScript emailModal error ঠিক করা (app.blade.php)
[x] P3: Navbar - hamburger breakpoint 991px এ নিয়ে আসা
[x] P4: Swiper arrow size ছোট করা (index.css)
[x] P5: University card fixed width overflow ঠিক করা (index.css)

দ্বিতীয় পর্যায় - High Priority (UX ভালো করা):
[x] P6: Top header mobile compact layout
[x] P7: Mobile submenu touch toggle (JS)
[x] P8: Hero slider text size ও height mobile-এ কমানো
[x] P9: Appointment link mobile menu-তে যোগ করা
[x] P10: Google Translate widget mobile fix

তৃতীয় পর্যায় - Polish (চমৎকার করা):
[x] P11: Footer link touch targets
[x] P12: Hero badge/logo position mobile
[x] P13: CSS media query cleanup
[x] P14: Scroll to top button position
```

---

## 📁 মূল ফাইলসমূহ (যেগুলো পরিবর্তন করতে হবে)

| ফাইল | পরিবর্তনের কারণ | Priority |
|------|----------------|----------|
| `resources/views/frontend/app.blade.php` | body padding, JS error, duplicate media queries | 🔴 Critical |
| `resources/views/frontend/includes/header.blade.php` | Hamburger breakpoint, submenu touch | 🔴 Critical |
| `public/css/index.css` | Swiper arrow size, university card width | 🔴 Critical |
| `resources/views/frontend/includes/top-header.blade.php` | Compact mobile layout | 🟠 High |
| `resources/views/frontend/index.blade.php` | Hero slider mobile styles | 🟠 High |
| `resources/views/frontend/includes/footer.blade.php` | Touch targets | 🟡 Medium |

---

## 🖼️ স্ক্রিনশট রেফারেন্স

- **Desktop View:** `brain/b747fad3.../desktop_home_view_1775111534289.png`
- **Mobile Top (375px):** `brain/b747fad3.../mobile_hero_section_1775111548347.png`
- **Mobile Full Scroll:** `brain/b747fad3.../mobile_full_page_audit_1775111697617.png`

---

## ✅ সাফল্যের মানদণ্ড (Definition of Done)

একটি ফিক্স সফল হবে যখন:
1. 375px width-এ কোনো horizontal scroll নেই
2. Navigation mobile-এ সম্পূর্ণ কাজ করছে (hamburger + submenu)
3. Top header একটি compact সুন্দর row-এ দেখাচ্ছে
4. Hero slider arrows tiny ও unobtrusive
5. সব section-এ consistent padding আছে
6. Console-এ কোনো JS error নেই
7. সব touch targets কমপক্ষে 44x44px
