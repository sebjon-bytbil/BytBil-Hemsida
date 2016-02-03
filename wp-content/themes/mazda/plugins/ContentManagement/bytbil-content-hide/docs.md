## Structure of hideables.json

``` javascript
{
  "default": {
      "hide": [
          "default hidden"
      ],
      "disable": [
          "default disabled"
      ]
  },
  "post_type": {
      "hide": [
          "Hidden for post type edit"
      ],
      "disable": [
          "Disabled for post type"
      ],
      "nots": [
          "Excluded from hide and disable"
      ],
      "hideable": {
          "hide": [
              "hidden if child can hide"
          ],
          "disable": [
              "disabled if child can hide"
          ],
          "nots": [
              "excluded from above"
          ],
      },
      "editable": {
          "hide": [
              "hidden if child can edit"
          ],
          "disable": [
              "disabled if child can edit"
          ],
          "nots": [
              "excluded from above"
          ],
      },
  }
}
```