package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalService;
import ku.cs.habaanhainong.service.AnimalTypeService;
import org.json.JSONObject;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.Map;

@Controller
public class AnimalTypeViewController {

    private final AnimalTypeService animalTypeService = new AnimalTypeService();

    @GetMapping("/animal-type-view")
    public String getAnimalType(Model animalTypes){
        ArrayList<Object> animalTypeLists = (ArrayList<Object>) animalTypeService.getAnimalTypes();
        animalTypes.addAttribute("animalTypes", animalTypeLists);
        return "animal-type-view";
    }

    @PostMapping("animals-type/add")
    public String createAnimalType(Model model, @RequestParam Map<String,String> params) {
        System.out.println(params);
        JSONObject jsonObject = new JSONObject();
        jsonObject.put("type", params.get("type"));

        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);
        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
        AnimalTypeService.postAnimalType(req);
        return "redirect:/animal-type-view";
    }

//    @DeleteMapping("animal-type/delete")
//    public String deleteAnimalType(Model model, @RequestParam Map<String,String> params){
//        System.out.println(params);
//        JSONObject jsonObject = new JSONObject();
//        jsonObject.put("type", params.get("type"));
//
//        HttpHeaders headers = new HttpHeaders();
//        headers.setContentType(MediaType.APPLICATION_JSON);
//
//        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
//        AnimalTypeService.deleteAnimalType(req);
//        return "redirect:/animal-type-view";
//
//    }
}
