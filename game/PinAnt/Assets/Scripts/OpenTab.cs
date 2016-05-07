using UnityEngine;
using System.Collections;

public class OpenTab : MonoBehaviour {

    public GameObject tabToOpen;

    public void Open_Tab()
    {
        tabToOpen.SetActive(true);
    }
}
