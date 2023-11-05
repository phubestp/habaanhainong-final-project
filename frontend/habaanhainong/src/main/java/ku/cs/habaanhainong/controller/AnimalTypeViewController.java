package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalService;
import ku.cs.habaanhainong.service.AnimalTypeService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;

@Controller
public class AnimalTypeViewController {

    private final AnimalTypeService animalTypeService = new AnimalTypeService();

    @RequestMapping("/animal-type-view")
    public String getAnimalType(Model animalTypes){
        ArrayList<Object> animalTypeLists = (ArrayList<Object>) animalTypeService.getAnimalTypes();
        animalTypes.addAttribute("animalTypes", animalTypeLists);
        return "animal-type-view";
    }
}
