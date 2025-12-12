(function(){
  const body = document.body;
  const toggleBtn = document.getElementById('langToggle');
  const enquireModal = document.getElementById('enquireModal');
  const enquireForm = document.getElementById('enquireForm') || document.getElementById('contactForm');

  // Minimal i18n strings
  const strings = {
    en: {
      'nav.home':'Home','nav.horses':'Horses','nav.heritage':'Heritage','nav.gallery':'Gallery','nav.blog':'Blog','nav.about':'About','nav.contact':'Contact',
      'hero.title.line1':'Authentic Marwari Horses','hero.title.line2':'Punjabi Heritage. Global Standards.','hero.subtitle':'Inspired by Sikh valor and legacy — excellence in breeding, care, and lineage.',
      'cta.viewHorses':'View Horses','cta.explore':'Explore','cta.enquire':'Enquire','cta.details':'Details','cta.whatsapp':'WhatsApp',
      'quick.forSale':'Horses for Sale','quick.forSaleDesc':'Browse handpicked Marwari horses with verified pedigree.',
      'quick.stallions':'Breeding Stallions','quick.stallionsDesc':'Premium bloodlines available for select coverings.',
      'quick.heritage':'Punjabi & Sikh Heritage','quick.heritageDesc':'Explore horses in Sikh history and Punjabi culture.',
      'quick.contact':'Contact & Enquiry','quick.contactDesc':'Reach us for viewing, pricing, and export guidance.',
      'featured.title':'Featured Horses','featured.viewAll':'View all',
      'modal.enquireTitle':'Enquire about Horse','form.horse':'Horse','form.name':'Your Name','form.phone':'Phone/WhatsApp','form.message':'Message','form.submit':'Send Enquiry','form.whatsapp':'Open WhatsApp',
      'horses.title':'Horses','horses.filter.sale':'For Sale','horses.filter.stallions':'Breeding Stallions','horses.filter.mares':'Mares','horses.filter.young':'Youngstock','horses.sale':'For Sale','horses.stallions':'Breeding Stallions','horses.mares':'Mares','horses.young':'Youngstock',
      'about.title':'About Us','about.lead':'Legacy of horse breeding in Punjab, inspired by Sikh warriors and guided by global standards.','about.missionTitle':'Our Mission','about.mission':'To preserve and elevate the Marwari breed with ethical breeding, transparent care, and international professionalism.','about.heritageTitle':'Heritage & Inspiration','about.heritage':'We honor the legacy of Sikh warriors and the deep bond between Punjab and horses, drawing inspiration from figures like Baba Deep Singh Ji.',
      'heritage.title':'Punjabi & Sikh Heritage','heritage.lead':'The timeless bond of Punjab and horses — courage, dignity, and devotion.','heritage.item1.title':'Baba Deep Singh Ji','heritage.item1.text':'A symbol of valor and sacrifice; horses stood alongside Sikh warriors in defense of faith and justice.','heritage.item2.title':'Maharaja Ranjit Singh','heritage.item2.text':'The Sikh Empire’s cavalry was renowned for discipline and horsemanship, with proud equine traditions.','heritage.item3.title':'Nihang Traditions','heritage.item3.text':'The warrior-saints preserved martial arts and mounted heritage that continues to inspire today.',
      'gallery.title':'Gallery','blog.title':'Articles','contact.title':'Contact & Enquiry','form.email':'Email'
    },
    pa: {
      'nav.home':'ਘਰ','nav.horses':'ਘੋੜੇ','nav.heritage':'ਵਿਰਾਸਤ','nav.gallery':'ਗੈਲਰੀ','nav.blog':'ਬਲਾਗ','nav.about':'ਸਾਡੇ ਬਾਰੇ','nav.contact':'ਸੰਪਰਕ',
      'hero.title.line1':'ਅਸਲ ਮਾਰਵਾੜੀ ਘੋੜੇ','hero.title.line2':'ਪੰਜਾਬੀ ਵਿਰਾਸਤ। ਗਲੋਬਲ ਮਿਆਰ।','hero.subtitle':'ਸਿੱਖ ਬਹਾਦਰੀ ਅਤੇ ਵਿਰਾਸਤ ਤੋਂ ਪ੍ਰੇਰਿਤ — ਬਰੀਡਿੰਗ, ਦੇਖਭਾਲ ਅਤੇ ਨਸਲ ਵਿੱਚ ਉਤਕ੍ਰਿਸ਼ਟਤਾ।',
      'cta.viewHorses':'ਘੋੜੇ ਵੇਖੋ','cta.explore':'ਖੋਜੋ','cta.enquire':'ਪੁੱਛਗਿੱਛ','cta.details':'ਵੇਰਵੇ','cta.whatsapp':'ਵਟਸਐਪ',
      'quick.forSale':'ਵਿਕਰੀ ਲਈ ਘੋੜੇ','quick.forSaleDesc':'ਪੜਤਾਲ ਕੀਤੀ ਵੰਸ਼ਾਵਲੀ ਨਾਲ ਚੁਣੇ ਹੋਏ ਮਾਰਵਾੜੀ ਘੋੜੇ।',
      'quick.stallions':'ਪਾਲਣ-ਪੋਸ਼ਣ ਸਟੈਲਿਅਨ','quick.stallionsDesc':'ਚੁਣਿੰਦਾ ਕਵਰਿੰਗ ਲਈ ਪ੍ਰੀਮੀਅਮ ਖੂਨ-ਲਹੂ।',
      'quick.heritage':'ਪੰਜਾਬੀ ਅਤੇ ਸਿੱਖ ਵਿਰਾਸਤ','quick.heritageDesc':'ਸਿੱਖ ਇਤਿਹਾਸ ਅਤੇ ਪੰਜਾਬੀ ਸਭਿਆਚਾਰ ਵਿੱਚ ਘੋੜਿਆਂ ਦੀ ਭੂਮਿਕਾ।',
      'quick.contact':'ਸੰਪਰਕ ਅਤੇ ਪੁੱਛਗਿੱਛ','quick.contactDesc':'ਵੇਖਣ, ਕੀਮਤ ਅਤੇ ਨਿਰਯਾਤ ਮਦਦ ਲਈ ਸੰਪਰਕ ਕਰੋ।',
      'featured.title':'ਚੁਣੇ ਹੋਏ ਘੋੜੇ','featured.viewAll':'ਸਭ ਵੇਖੋ',
      'modal.enquireTitle':'ਘੋੜੇ ਬਾਰੇ ਪੁੱਛਗਿੱਛ','form.horse':'ਘੋੜਾ','form.name':'ਤੁਹਾਡਾ ਨਾਮ','form.phone':'ਫੋਨ/ਵਟਸਐਪ','form.message':'ਸੰਦ ਦਾ ਪੈਗਾਮ','form.submit':'ਪੁੱਛਗਿੱਛ ਭੇਜੋ','form.whatsapp':'ਵਟਸਐਪ ਖੋਲ੍ਹੋ',
      'horses.title':'ਘੋੜੇ','horses.filter.sale':'ਵਿਕਰੀ ਲਈ','horses.filter.stallions':'ਸਟੈਲਿਅਨ','horses.filter.mares':'ਮਾਦਾ','horses.filter.young':'ਨਵੀਂ ਉਮਰ','horses.sale':'ਵਿਕਰੀ ਲਈ','horses.stallions':'ਸਟੈਲਿਅਨ','horses.mares':'ਮਾਦਾ','horses.young':'ਨਵੀਂ ਉਮਰ',
      'about.title':'ਸਾਡੇ ਬਾਰੇ','about.lead':'ਪੰਜਾਬ ਵਿੱਚ ਘੋੜੇ ਪਾਲਣ ਦੀ ਵਿਰਾਸਤ, ਸਿੱਖ ਯੋਧਿਆਂ ਤੋਂ ਪ੍ਰੇਰਿਤ ਅਤੇ ਗਲੋਬਲ ਮਿਆਰਾਂ ਨਾਲ।','about.missionTitle':'ਸਾਡਾ ਮਿਸ਼ਨ','about.mission':'ਨੈਤਿਕ ਬਰੀਡਿੰਗ, ਪਾਰਦਰਸ਼ੀ ਦੇਖਭਾਲ ਅਤੇ ਅੰਤਰਰਾਸ਼ਟਰੀ ਪੇਸ਼ੇਵਰਤਾ ਨਾਲ ਮਾਰਵਾੜੀ ਨਸਲ ਨੂੰ ਉੱਚਾ ਚੁੱਕਣਾ।','about.heritageTitle':'ਵਿਰਾਸਤ ਅਤੇ ਪ੍ਰੇਰਣਾ','about.heritage':'ਅਸੀਂ ਸਿੱਖ ਯੋਧਿਆਂ ਦੀ ਵਿਰਾਸਤ ਅਤੇ ਪੰਜਾਬ ਅਤੇ ਘੋੜਿਆਂ ਦੇ ਡੂੰਘੇ ਰਿਸ਼ਤੇ ਦਾ ਆਦਰ ਕਰਦੇ ਹਾਂ।',
      'heritage.title':'ਪੰਜਾਬੀ ਅਤੇ ਸਿੱਖ ਵਿਰਾਸਤ','heritage.lead':'ਪੰਜਾਬ ਅਤੇ ਘੋੜਿਆਂ ਦਾ ਅਟੁੱਟ ਨਾਤਾ — ਹੌਸਲਾ, ਇੱਜ਼ਤ ਅਤੇ ਸਮਰਪਣ।','heritage.item1.title':'ਬਾਬਾ ਦੀਪ ਸਿੰਘ ਜੀ','heritage.item1.text':'ਬਹਾਦਰੀ ਅਤੇ ਬਲੀਦਾਨ ਦਾ ਪ੍ਰਤੀਕ; ਸਿੱਖ ਯੋਧਿਆਂ ਦੇ ਨਾਲ ਘੋੜੇ ਹਮੇਸ਼ਾਂ ਖੜੇ ਰਹੇ।','heritage.item2.title':'ਮਹਾਰਾਜਾ ਰਣਜੀਤ ਸਿੰਘ','heritage.item2.text':'ਸਿੱਖ ਸਮਰਾਜ ਦੀ ਘੁੜਸਵਾਰੀ ਅਨੁਸ਼ਾਸਨ ਅਤੇ ਘੁੜਸਵਾਰੀ ਲਈ ਮਸ਼ਹੂਰ ਸੀ।','heritage.item3.title':'ਨਿਹੰਗ ਪਰੰਪਰਾਵਾਂ','heritage.item3.text':'ਯੋਧਾ-ਸੰਤਾਂ ਨੇ ਅਸਲੀਤ ਅਤੇ ਸਵਾਰ ਪਰੰਪਰਾਵਾਂ ਨੂੰ ਸੰਭਾਲਿਆ।',
      'gallery.title':'ਗੈਲਰੀ','blog.title':'ਲੇਖ','contact.title':'ਸੰਪਰਕ ਅਤੇ ਪੁੱਛਗਿੱਛ','form.email':'ਈਮੇਲ'
    }
  };

  function setLanguage(lang){
    body.setAttribute('data-lang', lang === 'pa' ? 'pa' : 'en');
    const dict = strings[lang] || strings.en;
    document.querySelectorAll('[data-i18n]').forEach(function(el){
      const key = el.getAttribute('data-i18n');
      if(dict[key]){ el.textContent = dict[key]; }
    });
  }

  if(toggleBtn){
    let current = localStorage.getItem('lang') || 'en';
    setLanguage(current);
    toggleBtn.addEventListener('click', function(){
      current = current === 'en' ? 'pa' : 'en';
      localStorage.setItem('lang', current);
      setLanguage(current);
    });
  } else {
    setLanguage(localStorage.getItem('lang') || 'en');
  }

  // Populate horse name on enquire modal and wire WhatsApp link
  if(enquireModal){
    enquireModal.addEventListener('show.bs.modal', function(ev){
      const button = ev.relatedTarget;
      const name = button && button.getAttribute('data-horse');
      const input = document.getElementById('horseName');
      if(input && name){ input.value = name; }
    });
  }

  if(enquireForm){
    enquireForm.addEventListener('submit', function(e){
      e.preventDefault();
      const formData = new FormData(enquireForm);
      const name = formData.get('name') || '';
      const phone = formData.get('phone') || '';
      const horse = formData.get('horse') || 'General Enquiry';
      const message = formData.get('message') || '';
      const target = '0000000000'; // TODO: replace with real number
      const text = encodeURIComponent(`Enquiry about: ${horse}\nName: ${name}\nPhone: ${phone}\nMessage: ${message}`);
      const link = `https://wa.me/${target}?text=${text}`;
      const a = document.getElementById('waLink');
      if(a){ a.href = link; a.click(); }
    });
  }
})();


