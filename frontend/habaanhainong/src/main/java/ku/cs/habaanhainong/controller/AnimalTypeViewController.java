package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;

@Controller
public class AnimalTypeViewController {
    @RequestMapping("/animal-type-view")
    public String getAnimalType(Model animalTypes){
        ArrayList<String> animalTypeLists = new ArrayList<>();
        animalTypeLists.add("แมว");
        animalTypeLists.add("หมา");
        animalTypes.addAttribute("animalType", animalTypeLists);
        return "animal-type-view";
    }
}
