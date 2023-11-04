package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.APIServices;
import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.Map;

public class AnimalAPIShowCaseController {
    @RequestMapping ("/animals")
    public String getHomePage(Model model) {
//        System.out.println(APIServices.getAnimals());
//        model.addAttribute("animals", APIServices.getAnimals());
//        // ต้องคืนค่าเป็นชื่อไฟล์ html template โดยในเมธอดนี้ คืนค่าเป็น home.html
        return "animalapishowcase";
    }

//    @PostMapping("animals/add")
//    public String createMenu(Model model,@RequestParam Map<String,String> params) {
//        System.out.println(params);
//        JSONObject jsonObject = new JSONObject();
//
//        jsonObject.put("name", params.get("name"));
//        jsonObject.put("animal_type", params.get("animal_type"));
//        jsonObject.put("breed", params.get("breed"));
//        jsonObject.put("sex", params.get("sex"));
//
//        HttpHeaders headers = new HttpHeaders();
//        headers.setContentType(MediaType.APPLICATION_JSON);
//
//        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
//        APIServices.addAnimal(req);
//        return "redirect:/animals";
//    }
}
